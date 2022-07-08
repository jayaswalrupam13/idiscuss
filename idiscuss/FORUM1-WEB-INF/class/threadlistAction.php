<?php
class threadlistAction
{
	function execute(&$request,$pdoObj,$proObj)
	{
		global $NUM_THREAD_PER_PAGE;
		$return = [];
		$return['page'] = '';
		
		$return['details']['category_id'] = $request->getParameter("category_id");		
		if(!$return['details']['category_id'] || !is_numeric($return['details']['category_id']) || $return['details']['category_id']<0){
			$return['details']['category_id'] = 1;
		}
		
		if(isset($_GET['page'])){
			$return['page'] = $request->getParameter("page");
		}
		if(!$return['page'] || !is_numeric($return['page']) || $return['page']<0){
			$return['page'] = 1;
		}
		
		$return['total_threads'] = $proObj->countThreadsByCategory($pdoObj,$return['details']);
		$return['total_pages']   = ceil($return['total_threads']/$NUM_THREAD_PER_PAGE);
		
		$return['category'] = $proObj->getCategoryDetails($pdoObj,$return['details']);
		$method   = $_SERVER['REQUEST_METHOD'];

		if($method == 'POST' && isset($_REQUEST['submit']) && isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)){
			$return['details']['thread_title']   = $_REQUEST['title'];
			$return['details']['thread_desc']    = $_REQUEST['desc'];
			$return['details']['thread_user_id'] = $_SESSION['user_id'];
			if($return['details']['thread_title'] && $return['details']['thread_desc']){
				$proObj->createThread($pdoObj,$return['details']);
				$return['details']['status'] = 'success';
				$return['details']['msg'] = 'You thread has been added!. Please wait for the community to respond.';		
			}
			else{
				$return['details']['status'] = 'danger';
				$return['details']['msg'] = 'All fields are compulsory to post the thread.';
			}	
		}	
        $startInDB = ($return['page'] - 1) * $NUM_THREAD_PER_PAGE;	
		$return['thread'] = $proObj->getFewThreadsByCategory($pdoObj,$return['details'],$startInDB,$NUM_THREAD_PER_PAGE);//echo "<pre>";print_r($return);
		return $return;
	}
}
?>