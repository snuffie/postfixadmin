<?php
require_once('common.php');

	
	$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax)
	{
		$username = $_REQUEST['login'];
		$password = $_REQUEST['pass'];
		
		if($username == 'egdbull' && $password == 'najsbull')
		{
			echo "success";	
		}
	}


?>

