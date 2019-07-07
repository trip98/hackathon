<?php 	
namespace app;

class Authentication {
	use View;

	use ModelTranslator, ModelUser {
        ModelUser::getLink insteadof ModelTranslator;
        ModelUser::encrypt insteadof ModelTranslator;
        ModelUser::decrypt insteadof ModelTranslator;
    }

	public function main() {
		self::renderCommon('header', ['title' => 'Главная']);
		self::renderv('main', 'pages', ['data' => $data]);
		self::renderCommon('footer');
	}
	public function authorization() {
		self::renderCommon('header', ['title' => 'Авторизация']);
		self::render('authorization', 'pages');
		self::renderCommon('footer');
	}
	public function languages() {
		$data = self::getLanguages();
		$data = json_encode($data, true);
		echo $data;
	}

	public function entry($request) {
		$request = $request['POST'];
		$result = self::entryDb($request);
		echo $result;
	}
	public function add($request) {
		if($_SESSION['user']) header('Location: /');
		$request = $request['POST'];
		// $request['role'] = (int)$request['role'];
		// if($request['role'] == 2){
			echo self::addUser($request);
		// }else if($request['role'] == 3)
			// echo self::addTranslator($request);
	}
	public function logout() {
		unset($_SESSION['user']);
		header('Location: /');
	}

	public function render($type) {
		if($type == 1) {
			header('Location: /cabinet/admin');
		} elseif($type == 2) {
			header('Location: /cabinet/user');
		} elseif ($type == 3) {
			header('Location: /cabinet/translator');
		}
	}
}


 ?>