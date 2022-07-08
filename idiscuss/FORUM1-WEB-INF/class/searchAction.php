<?php
class searchAction
{
	function execute(&$request,$pdoObj,$proObj)
	{
		$result['keyword'] = $request->getParameter("search");
		$result['result']  = $proObj->searchByUser($pdoObj,$result['keyword']);//echo "<br><pre> is ";print_r($result);
		return $result;
	}
}
?>