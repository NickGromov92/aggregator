<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Добавить новый товар</title>
</head>
<body>
	<h1>Страница добавления нового товара</h1>
	<form action="add-item-res.php" method="post">
		<label for="title">Название товара</label>
		<input type="text" id="title" name="title">
		<label for="img">Изображение товара (ссылка)</label>
		<input type="text" id="img" name="img">
		<label for="price">Средняя цена</label>
		<input type="text" id="price" name="price">
		<label for="name">Имя добавившего товар</label>
		<input type="text" id="name" name="name">
		<button type="submit">Добавить</button>
	</form>
</body>
</html>
