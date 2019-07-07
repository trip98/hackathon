<?php 
session_start();
require __DIR__ . "/vendor/autoload.php";
use app\Route;


Route::GET("/", "Main@index");
Route::GET("/main", "Main@index");
Route::GET('/main', 'Authentication@main');
Route::GET('/authorization', 'Authentication@authorization');
Route::POST('/registration', 'Authentication@add');
Route::POST('/entry', 'Authentication@entry');
Route::GET('/logout', 'Authentication@logout');
Route::GET('/lesson', 'Main@lesson');

Route::GET('/cabinet/user', 'Cabinet@user');
Route::GET('/cabinet/translator', 'Cabinet@translator');
Route::GET('/cabinet/admin', 'Cabinet@admin');


Route::GET('/curs', 'Main@curs');

Route::GET('/getLanguages', 'Authentication@languages');
Route::ValidationPath();
 ?>