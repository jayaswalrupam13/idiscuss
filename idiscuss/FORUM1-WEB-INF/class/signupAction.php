<?php
class signupAction
{
	function execute(&$request,$pdoObj,$proObj)
	{
		global $SITE_NAME;
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST['submit'])){
			if(isset($_POST['captcha_challenge']) && $_POST['captcha_challenge'] == $_SESSION['captcha_text']){			
				$details['user_email']  = $request->getParameter("signupEmail");
				$details['user_pass']   = $request->getParameter("password");
				$details['user_cpass']  = $request->getParameter("cpassword");//filter_var($details['user_pass'], FILTER_VALIDATE_EMAIL);
				
				if(empty($details['user_email']) || empty($details['user_pass']) || empty($details['user_cpass'])){
					$details['status'] = 'danger';
					$details['msg']    = 'All fields are mandatory';
				}
				elseif($proObj->checkUserExists($pdoObj, $details['user_email'])){
					$details['status'] = 'danger';
					$details['msg']    = 'Email already in use. Choose another one';
				}
				elseif($details['user_pass'] != $details['user_pass']){
					$details['status'] = 'danger';
					$details['msg']    = 'Passwords dont match';
				}
				else{
					$proObj->addUser($pdoObj, $details);
					$details['status'] = 'success';
					$details['msg']    = 'Account has been created. You can login now.';				
				}				
			}
			else{
				$details['status'] = 'danger';
				$details['msg']    = 'Please enter the correct captcha';
			}
			header("Location:/$SITE_NAME?status=".base64_encode($details['status'])."&msg=".base64_encode($details['msg']));die();
		}
	}
}
?>