<?php
$db_server   = 'localhost';
$db_login    = 'bulbst_admin';
$db_password = 'ghjuhfvvbhjdfybt';
$db_proj_cb  = 'bulbst_gor';

$dbcnx = @mysql_connect($db_server,$db_login,$db_password);
    if (!$dbcnx) // Если дескриптор равен 0 соединение не установлено
    {
      echo("<P>В настоящий момент сервер базы данных не доступен, поэтому 
               корректное отображение страницы невозможно.</P>");
      exit();
    }
	if (!@mysql_select_db($db_proj_cb, $dbcnx)) 
	{
	  echo( "<P>В настоящий момент база данных не доступна, поэтому
		        корректное отображение страницы невозможно.</P>" );
	  exit();
	}
mysql_set_charset('utf8');
?>