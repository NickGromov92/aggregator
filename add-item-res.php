<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Добавление нового товара</title>
</head>
<body>

<?php // Внесение данных в БД из формы добавления нового товара
	include "db.php"; // Поключение к БД
	$your_date = date("Y-m-d"); // Переменная для генерации даты
	$result = mysql_query("INSERT INTO main (title,img,price,date,name) VALUE ('$_POST[title]','$_POST[img]','$_POST[price]','$your_date','$_POST[name]')");

	if($result == true) // Проверка добавления
	{
		echo "<h1>Товар добавлен</h1>";
	}
	else 
	{
		echo "<span>Внимание! Товар не добавлен!</span>";
	}
?>

</body>
</html>