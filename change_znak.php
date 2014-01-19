<?php
session_start();
	
	include('config.php');
	
	$vk_id = $_SESSION['uid'];
	$znak = $_GET['znak'];
	
	mysql_query("UPDATE `users` SET `znak`=$znak WHERE `vk_id`=$vk_id");
	
?>