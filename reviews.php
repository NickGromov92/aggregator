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
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Arimo:400,700&subset=cyrillic" rel="stylesheet">
</head>
<body>

	<main class="reviews">

	<?php
		echo
			"<div class='item-title'>
				<h1>$row[title]</h1>
			 </div>
			<img src='$row[img]' width='300px' heigh='300px' alt='$row[title]'>";
	?>

	<?php
		$result2 = mysql_query("SELECT avg(rating) AS rating FROM reviews WHERE itemid=$id"); // Извлечение средней оценки товара
		$row2=mysql_fetch_array($result2);
		echo
			"<span>
				Рейтинг: <em>$row2[0]</em>
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
					<td class='td-left'>$myrow1[name]</td>
					<td>$myrow1[rating]</td>
					<td class='td-left'>$myrow1[comment]</td>
					<td>$myrow1[date]</td>
				</tr>";
		}
	?>

		</table>
		<span>Поделитесь Вашим мнением!</span>
		<div class="form-block">	
			<form action="reviews-res.php?itemid=<?php echo "$id"; ?>" method="post">
				<div class="block-in-form clearfix">
					<label for="name" class="icon-user">Имя оставившего отзыв</label>
					<input type="text" id="name" name="name" placeholder="Имя и/или Ник" required autofocus>
					<label for="rating" class="icon-star-empty">Оценка</label>
					<input type="number" id="rating" name="rating" min="1" max="10" required placeholder="Оценка от 1-го до 10-ти"
	>
					<label for="comment" class="icon-comment-empty">Комментарий</label>
					<input type="text" id="comment" name="comment" placeholder="Всё круто!">
				</div>
				<button type="submit" class="btn form-btn">Отправить</button>
			</form>
		</div>
		<a href="page.php" class="btn">На главную</a>
	</main>

</body>
</html>