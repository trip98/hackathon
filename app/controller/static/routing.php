<?php 
namespace app;

class Route {

	use View;

	static public $path = "";
	static private $routes = [];
	static private $request = [];

	static public function GET($route, $function) {
		$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);    
		if($_SERVER['REQUEST_METHOD']!='GET') return;
		self::$routes[] = ["method" => "GET", "route" => self::$path.$route];		
		if($route!=self::$path.$path) return;
		self::ValidationGET();
		$data = explode("@", $function);
		$className = "app\\$data[0]";
		$method = $data[1];
		$class = new $className;
		$class->$method(self::$request);
	}

	static public function POST($route, $function) {
		$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);    
		if($_SERVER['REQUEST_METHOD']!='POST') return;
		self::$routes[] = ["method" => "POST", "route" => $route];		
		if($route!=$path) return;
		self::ValidationPOST();
		$data = explode("@", $function);
		$className = "app\\$data[0]";
		$method = $data[1];
		$class = new $className;
		$class->$method(self::$request);
	}	

	static private function ValidationGET() {
		foreach ($_GET as $key => $value) {
			self::$request[$key] = strip_tags(htmlspecialchars(trim($value)));
		}
	}
	static private function ValidationPOST() {
		foreach ($_GET as $key => $value) {
			self::$request["GET"][$key] = strip_tags(htmlspecialchars(trim($value)));
		}
		foreach ($_POST as $key => $value) {
			self::$request["POST"][$key] = strip_tags(htmlspecialchars(trim($value)));
		}
	}

	// Errors
	static public function ValidationPath() {
		$method = $_SERVER['REQUEST_METHOD'];
		$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$result = in_array(["method" => $method, "route" => $path], self::$routes);
		echo (!$result)?self::E404():"";
	}
	static public function E404() {
		self::render("404", "errors", []);
	}
	static public function E500() {
		self::render("500", "errors", []);
	}
}

 ?>