<?php 	
namespace app;

class Cabinet {
	use View;

	public function admin() {
		self::renderCommon('header', ['title' => 'Административная панель']);
		self::renderv('cabinet/admin', 'pages');
		self::renderCommon('footer');
	}
	public function user() {
		self::renderCommon('header', ['title' => 'Личный кабинет']);
		self::renderv('cabinet/user', 'pages');
		self::renderCommon('footer');
	}
	public function translator() {
		self::renderCommon('header', ['title' => 'Кабинет переводчика']);
		self::renderv('cabinet/translator', 'pages');
		self::renderCommon('footer');
	}
}

 ?>