<?php
class logoutAction
{
	function execute()
	{
		global $SITE_NAME;
		echo "Logging you out. Please wait...";

		session_destroy();
		header("Location:/$SITE_NAME");die();
	}
}
?>