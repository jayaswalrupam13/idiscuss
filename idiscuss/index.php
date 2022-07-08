<?php
session_start();
include "C:/xampp/htdocs/idiscuss/FORUM1-WEB-INF/config.inc.php";
require_once $HTDOCS_PATH."/PDOClass.php";
require $CLASS_PATH."/process.class.php";

header('Expires: -1');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-Cache');

class Request{

	function getParameter($name){
		if(isset($_REQUEST[$name])){
			return $this->prevent_xss($_REQUEST[$name]);
		}
	}

	function prevent_xss($str){
		if (is_array($str)) {
				foreach($str as $key => $value){
					$str[$key] = $this->prevent_xss($value);
			}
		}
		else{
			$str = trim(htmlentities($str,ENT_QUOTES));
		}
		return $str;
	}
}
$request = new Request();
$pdoObj  = new PDOClass();
$proObj  = new process();
$do	     = $request->getParameter("do");
$list    = $proObj->getCategories($pdoObj);

//language feature
$lang = '';
if(isset($_REQUEST["app_lang"])){
	$lang = $request->getParameter("app_lang");
	if(!in_array($lang, $LANG_LIST)){
		$lang = '';
	}
}
if($lang == "")
{
	$acceptLang = $_SERVER["HTTP_ACCEPT_LANGUAGE"];	
	$acceptLang = explode(",",$acceptLang);
	switch($acceptLang[0])
	{
		case 'hi' : // Hindi
		{
			$lang = "hi";
			break;
		}
		default:
		{
			$lang = "en-us";
			break;
		}
	}
} 
// Add a variable
output_add_rewrite_var('app_lang', $lang);
ini_set('url_rewriter.tags','a=href,form=');
include($LANG_PATH."/".$lang.".php");

switch($do)
{
	case "threadlist" :
	{
		include_once $CLASS_PATH."/threadlistAction.php";
		$threadlistAction = new threadlistAction();
		$return = $threadlistAction->execute($request,$pdoObj,$proObj);
		include_once $TPL_PATH."/header_tpl.php";
		include_once $TPL_PATH."/threadlist_tpl.php";
		break;
	}
	case "threads" :
	{
		include_once $CLASS_PATH."/threadsAction.php";
		$threadsAction = new threadsAction();
		$return = $threadsAction->execute($request,$pdoObj,$proObj);
		include_once $TPL_PATH."/header_tpl.php";
		include_once $TPL_PATH."/threads_tpl.php";
		break;
	}
	case "login" :
	{
		include_once $CLASS_PATH."/loginAction.php";
		$loginAction = new loginAction();
		$loginAction->execute($request,$pdoObj,$proObj);		
		include_once $TPL_PATH."/header_tpl.php";
		include_once $TPL_PATH."/login_tpl.php";
		break;
	}
	case "logout" :
	{
		include_once $CLASS_PATH."/logoutAction.php";
		$logoutAction = new logoutAction();
		$logoutAction->execute();
		break;
	}
	case "signup" :
	{
		include_once $CLASS_PATH."/signupAction.php";
		$signupAction = new signupAction();
		$signupAction->execute($request,$pdoObj,$proObj);
		break;
	}
	case "captcha" :
	{
		include_once $CLASS_PATH."/captcha.php";
		break;
	}
	case "search" :
	{
		include_once $CLASS_PATH."/searchAction.php";
		$searchAction = new searchAction();
		$return = $searchAction->execute($request,$pdoObj,$proObj);		
		include_once $TPL_PATH."/header_tpl.php";
		include_once $TPL_PATH."/search_tpl.php";
		break;
	}
	default:
	{
		include_once $TPL_PATH."/header_tpl.php";
		include_once $TPL_PATH."/home_tpl.php";
	}
}
include_once $TPL_PATH."/footer_tpl.php";
?>