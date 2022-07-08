<?php
class loginAction
{
	function execute(&$request,$pdoObj,$proObj)
	{
		global $SITE_NAME;
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST['submit'])){
			$response = $proObj->checkCaptcha();
			if($response['success'] == '1'){			
				$details['loginEmail']  = $request->getParameter("loginEmail");
				$details['loginPass']  = $request->getParameter("loginPass");
				
			
				if(empty($details['loginEmail']) || empty($details['loginPass'])){
					$details['status'] = 'danger';
					$details['msg']    = 'All fields are mandatory';
				}
				else{
					$user = $proObj->checkUserExists($pdoObj, $details['loginEmail']);
					if(empty($user)){
						$details['status'] = 'danger';						
						$details['msg']    = 'Username doesnot exist.';
					}
					elseif($proObj->matchPwd($details['loginPass'],$user['user_pass']) == false){
						$details['status'] = 'danger';						
						$details['msg']    = 'Incorrect password entered.';
					}
					else{	
						$_SESSION['loggedin']    = true;
						$_SESSION['useremail']  = $details['loginEmail'];
						header("Location:/$SITE_NAME"); die();
					}
				}
			}
			else{
				$details['status'] = 'danger';
				$details['msg']    = 'Please enter the correct captcha';
			}				
		}
		
		header("Location:/$SITE_NAME?status=".base64_encode($details['status'])."&msg=".base64_encode($details['msg']));die();
	}
}
?>