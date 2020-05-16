<?
require_once "secure/session.inc.php";
require_once "secure/secure.inc.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Админка</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Администрирование магазина</h1>
	<h3>Доступные действия:</h3>
	<ul>
		<li><a href='admin/add2cat.php'>Добавление товара в каталог</a></li>
		<li><a href='admin/orders.php'>Просмотр готовых заказов</a></li>
		<li><a href='admin/secure/create_user.php'>Добавить пользователя</a></li>
		<li><a href='admin/index.php?logout'>Завершить сеанс</a></li>
	</ul>
</body>
</html>