<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Добавить новый товар</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Arimo:400,700&subset=cyrillic" rel="stylesheet">
</head>
<body>
	<main class="add-item">
		<h1 class="add-item-title">Страница добавления нового товара</h1>
		<div class="form-block">
			<form action="add-item-res.php" method="post">
				<div class="block-in-form clearfix">
					<label for="title" class="icon-shopping-basket">Название товара</label>
					<input type="text" id="title" name="title" placeholder="Товар 1" required autofocus>
					<label for="img" class="icon-picture">Изображение товара (ссылка)</label>
					<input type="text" id="img" name="img" placeholder="img/img1.jpj">
					<label for="price" class="icon-dollar">Средняя цена</label>
					<input type="number" id="price" name="price" placeholder="100" required>
					<label for="name" class="icon-user">Имя добавившего товар</label>
					<input type="text" id="name" name="name" placeholder="Имя и/или Ник" required>
				</div>
				<button type="submit" class="btn form-btn">Добавить</button>
			</form>
		</div>
		<a href="page.php" class="btn">На главную</a>
	</main>
</body>
</html>