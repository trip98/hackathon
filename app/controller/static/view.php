<?php
	namespace app;
	
	trait View {
	    public function renderv($template, $path, $data = []) {
	        $file = $_SERVER['DOCUMENT_ROOT']."/static/views/$path/$template.php";
	        if(!file_exists($file)) {
	            Route::E404();
	            exit();
	        }
	        extract($data);
	        include($file);
	    }
	    public function renderCommon($template, $data = []) {
	    	$file = $_SERVER['DOCUMENT_ROOT']."/static/views/common/$template.php";
	        if(!file_exists($file)) {
	            Route::E404();
	            exit();
	        }
	        extract($data);
	        include($file);
	    }
	}
?>