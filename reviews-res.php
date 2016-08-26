<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Спасибо за Ваш отзыв!</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Arimo:400,700&subset=cyrillic" rel="stylesheet">
</head>
<body>

<?php // Внесение данных в БД из формы добавления нового отзыва
	include "db.php"; // Поключение к БД 
	$your_date = date("Y-m-d"); // Переменная для генерации даты
	$result = mysql_query("INSERT INTO reviews (itemid,name,rating,comment,date) VALUE ('$_GET[itemid]','$_POST[name]','$_POST[rating]','$_POST[comment]','$your_date')");

	if($result == true) // Проверка добавления
	{
		echo "<h1>Спасибо за Ваш отзыв!</h1>";
	}
	else 
	{
		echo "<span>Ой! Произошла ошибка. Оставьте Ваш отзыв позже</span>"; // Хьюстон, у нас проблемы!
	}
?>
	<a href="page.php" class="btn">На главную</a>
	<a href="reviews.php?id=<?php echo "$_GET[itemid]"; ?>" class="btn">На страницу товара</a>

</body>
</html>