<?php
	// Файл подключения к БД
	
	$db = mysql_connect("localhost", "root", "") or die (mysql_error());

	mysql_select_db("aggregator-db", $db);

	mysql_query ("set_client='utf8'");

	mysql_query ("set character_set_results='utf8'");

	mysql_query ("set collation_connection='utf8_general_ci'");

	mysql_query ("SET NAMES utf8");

?>
