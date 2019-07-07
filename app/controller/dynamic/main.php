<?php 
namespace app;

class Main {
	
	use View;
	use ModelMain;

	public function index(){
		self::renderCommon('header', ["title"=>"Главная"]);
		self::renderv("main","pages");
		self::renderCommon('footer');
	}
	public function curs($request) {
		$id = $request['id'];
		if(!$id) header('Location: /');
		self::renderCommon('header', ['title' => 'Математика']);
		self::renderv('curs', 'pages');
		self::renderCommon('footer');
	}
	public function lesson($request) {
		$id = $request['id'];
		if(!$id) header('Location: /');
		self::renderCommon('header');
		self::renderv('lesson', 'pages');
		self::renderCommon('footer');
	}
	public function historycurs($request) {
		self::renderCommon('header', ['title' => 'История']);
		self::renderv('historyCurs', 'pages');
		self::renderCommon('footer');
	}
	public function historyLesson($request) {
		self::renderCommon('header', ['title' => 'История']);
		self::renderv('historyLesson', 'pages');
		self::renderCommon('footer');
	}
}

 ?>