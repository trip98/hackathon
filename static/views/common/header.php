<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?? 'Нет заголовка' ?></title>
	<link rel="stylesheet" href="/static/css/style.css">
</head>
<body>
<div class="header">
	<div class="popup">
		<ul class='addp'>
			<a href='/curs?id=23'><li>Математика</li></a>
			<li>Русская литература</li>
			<li>Физика</li>
			<li>История</li>
		</ul>
	</div>	
	<div class="logo"></div>
	<div class="navigation">
		<ul class='links'>
			<li>Родителям</li>
			<li>Компаниям</li>
			<li>Переводчикам</li>
			<?php if(!$_SESSION['user']): ?>
				<li class="open">
					<button>Вход</button>
				</li>
			<?php else: ?>
				<li class="open">
					<a href='/cabinet/user'><button>Личный кабинет</button></a>
				</li>
				<li class="open">
					<a href='/logout'><button>Выход</button></a>
				</li>
			<?php endif; ?>
		</ul>
		<div class="form-navigation">
			<ul>
				<li><p class='inversePair' id='a'>Курсы</p></li>
				<li><input placeholder="Поиск" class='inversePair' id='b' type="text"></li>
			</ul>
		</div>
	</div>
</div>
<?php if(!$_SESSION['user']): ?>
<div class="subscripe-entry-form"></div>
<div class="entry-form">
	<div class="header-entry">
		<div class="navigation-entry">
			<ul>
				<li data-id='1'>Вход</li>
				<li data-id='2'>Регистрация</li>
			</ul>
			<hr>
			<button class="entry-vk">Вход через VK</button>
			<h2><span>или</span></h2>
		</div>
	</div>
	<div class="content-entry">
		<div class='subscripe-inputs'>
			<p><input placeholder="Электронный адрес" name='email' type="text"></p>
			<p><input placeholder="Пароль" name='password' type="password"></p>
		</div>
		<div class="subscripe-entry-button">
			<p>Button with icon</p>
			<button class='entry submit-entry'>Войти</button>
		</div>
	</div>
	<div class="footer-entry">
		<p>Нажимая кнопку "Вход" вы даёте согласие на хранение и обработку персональных данных</p>
	</div>
</div>
<?php endif; ?>