<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Главная</title>
</head>
<body>

	<table>
		<tr>
			<th><a href="page.php?sort=title">Название товара<a/></th>
			<th><a href="page.php?sort=img">Изображение</a></th>
			<th><a href="page.php?sort=date">Дата добавления</a></th>
			<th><a href="page.php?sort=name">Имя добавившего товар</a></th>
			<th><a href="page.php?sort=itemid">Количество отзывов</a></th>
		</tr>

<?php  // Сортировка столбцов таблицы
	$sort = isset($_GET['sort'])?$_GET['sort']:null;

	if($sort != 'title' && $sort != 'img' && $sort != 'date' && $sort != 'name' && $sort != 'itemid')
	{
		$sort = 'title';
	}
?>

<?php // Работа с таблицей
	include "db.php"; // Поключение к БД
	$result = mysql_query("SELECT a.id, a.title, a.img, a.date, a.name, COUNT(r.itemid) as xz FROM main a  LEFT JOIN reviews r ON a.id = r.itemid group by a.id ORDER BY ".$sort); // Извлечение всех значений, необходимых для заполнения полей таблицы из main, а также сумма строк отзывов (rating) по id каждого товара main из reviews
	while($myrow = mysql_fetch_array($result)) // Цикл заполнения таблицы
	{
	echo
		"<tr>
			<td><a href='reviews.php?id=$myrow[id]'>$myrow[title]</a></td>
			<td><img src='$myrow[img]'></td>
			<td>$myrow[date]</td>
			<td>$myrow[name]</td>
			<td>$myrow[5]</td>
		</tr>";
	}
?>

	</table>
	<a href="add-item.php">Добавить новый товар</a>
</body>
</html>