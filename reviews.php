<?php // Замена глобальной переменной для более быстрой работы.
	$id = $_GET["id"];
?>

<?php
	include "db.php"; // Поключение к БД
	$result = mysql_query("SELECT * FROM main WHERE id=$id"); // Извлечение значений определённого товара для заголовка и изображения
	$row = mysql_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?php echo "$row[title]"; ?></title>
</head>
<body>

<?php
	echo
		"<h1>$row[title]</h1>
		<img src='$row[img]'>";
?>

<?php
	$result2 = mysql_query("SELECT avg(rating) AS rating FROM reviews WHERE itemid=$id"); // Извлечение средней оценки товара
	$row2=mysql_fetch_array($result2);
	echo
		"<span>
			Рейтинг:<em>$row2[0]</em>
		 </span>";
?>
	<h2>Отзывы</h2>
	<table>
		<tr>
			<th>Имя добавившего</th>
			<th>Оценка</th>
			<th>Комментарий</th>
			<th>Дата добавления</th>
		</tr>

<?php // Работа с таблицей
	$result1 = mysql_query("SELECT * FROM reviews WHERE itemid=$id"); // Извлечение значений для таблицы отзывов определённого товара
	while($myrow1 = mysql_fetch_array($result1)) // Цикл заполнения полей таблицы
	{
		echo
			"<tr>
				<td>$myrow1[name]</td>
				<td>$myrow1[rating]</td>
				<td>$myrow1[comment]</td>
				<td>$myrow1[date]</td>
			</tr>";
	}
?>

	</table>
	<span>Поделитесь своим мнением!</span>
	<form action="reviews-res.php?itemid=<?php echo "$id"; ?>" method="post">
		<label for="name">Имя оставившего отзыв</label>
		<input type="text" id="name" name="name">
		<label for="rating">Оценка</label>
		<input type="text" id="rating" name="rating">
		<label for="comment">Комментарий</label>
		<input type="text" id="comment" name="comment">
		<button type="submit">Отправить</button>
	</form>
</body>
</html>