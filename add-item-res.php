<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Добавление нового товара</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Arimo:400,700&subset=cyrillic" rel="stylesheet">
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
	<a href="page.php" class="btn">На главную</a>
	<a href="add-item.php" class="btn">Добавить ещё один</a>

</body>
</html>