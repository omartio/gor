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
<<<<<<< HEAD
		$gor = urlencode("Ваш гороскоп на сегодня составлен<br>". substr(file_get_contents("http://bulbstudio.ru/gor/get_gor.php?znak=".$i) ,0, 97). "...");
		
=======
>>>>>>> 4d9a354eea6969850f2ef9de0fe492253715f180
		while ($res = mysql_fetch_array($resp)){
			$j++;
			$send_to .= $res['vk_id'] . ",";
			if ($j == 100)
			{
<<<<<<< HEAD
				file_get_contents('https://api.vk.com/method/secure.sendNotification?user_ids=' . $send_to . '&message='. $gor .'&client_secret=B7im8XpencK2CtM33Pqq&access_token='.$key);
=======
				file_get_contents('https://api.vk.com/method/secure.sendNotification?user_ids=' . $send_to . '&message=TEST&client_secret=B7im8XpencK2CtM33Pqq&access_token='.$key);
>>>>>>> 4d9a354eea6969850f2ef9de0fe492253715f180
				$j = 0;
				$send_to = "";
			}
		}
<<<<<<< HEAD
		file_get_contents('https://api.vk.com/method/secure.sendNotification?user_ids=' . $send_to . '&message='. $gor .'&client_secret=B7im8XpencK2CtM33Pqq&access_token='.$key);
=======
		file_get_contents('https://api.vk.com/method/secure.sendNotification?user_ids=' . $send_to . '&message=TEST&client_secret=B7im8XpencK2CtM33Pqq&access_token='.$key);
>>>>>>> 4d9a354eea6969850f2ef9de0fe492253715f180
	}

?>