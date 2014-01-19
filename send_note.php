<?php
	include "config.php";
	$APP_SECRET = "B7im8XpencK2CtM33Pqq";
	$resp = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id=4073836&client_secret=B7im8XpencK2CtM33Pqq&grant_type=client_credentials'));
	$key = $resp->access_token;
	
	for ($i = 0; $i < 12; $i++)
	{
		$resp = mysql_query("SELECT * FROM `users` WHERE `znak`=".$i);
		$send_to = "";
		$j = 0;
		while ($res = mysql_fetch_array($resp)){
			$j++;
			$send_to .= $res['vk_id'] . ",";
			if ($j == 100)
			{
				file_get_contents('https://api.vk.com/method/secure.sendNotification?user_ids=' . $send_to . '&message=TEST&client_secret=B7im8XpencK2CtM33Pqq&access_token='.$key);
				$j = 0;
				$send_to = "";
			}
		}
		file_get_contents('https://api.vk.com/method/secure.sendNotification?user_ids=' . $send_to . '&message=TEST&client_secret=B7im8XpencK2CtM33Pqq&access_token='.$key);
	}

?>