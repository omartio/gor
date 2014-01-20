<?php
session_start();
	
	include('config.php');
	
	$vk_id = $_GET['uid'];
	$znak  = -1;
	$_SESSION['uid'] = $vk_id;
	$prem = 0;
	
	$query = mysql_query("SELECT * FROM `users` WHERE `vk_id` = " . $vk_id);
	
	if (mysql_num_rows($query) == 0)
	{
		mysql_query("INSERT INTO `users`(`vk_id`, `znak`, `premium`) VALUES ($vk_id, $znak, '".date('Y-m-d H:i:s')."')");
	}
	else
	{
		$res = mysql_fetch_array($query);
		
		$prem_len = new DateTime($res['premium']);
		$znak = $res['znak'];
		
		$prem = $prem_len > new DateTime() ? $prem_len -> diff(new DateTime())->format("%d") : -1;
				
		$prem++;
	}
	
	echo json_encode(array('znak' => $znak, 'prem' => $prem));
?>