<?php
class threadsAction
{
	function execute(&$request,$pdoObj,$proObj)
	{
		$return = [];
		$return['details']['thread_id'] = $request->getParameter("thread_id");
		if(!$return['details']['thread_id'] || !is_numeric($return['details']['thread_id']) || $return['details']['thread_id']<0){
			$return['details']['thread_id'] = 1;
		}
		
		$return['thread'] = $proObj->getThreadDetails($pdoObj,$return['details']);
		$method = $_SERVER['REQUEST_METHOD'];

		if($method == 'POST' && isset($_REQUEST['submit']) && isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)){
			$return['details']['comment']    = strip_tags($_REQUEST['comment']);
			$return['details']['comment_by'] = $_SESSION['user_id'];
			$return['details']['thread_id']  = $request->getParameter("thread_id");
			if($return['details']['comment']){
				$proObj->addComment($pdoObj,$return['details']);
				$return['details']['status'] = 'success';
				$return['details']['msg']    = 'You Comment has been added!.';		
			}
			else{
				$return['details']['status'] = 'danger';
				$return['details']['msg']    = 'Please enter comment.';
			}	
		}
		$return['comments']  = $proObj->getComments($pdoObj,$return['details']);
		return $return;
	}
}
?>