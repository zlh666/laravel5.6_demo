<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Admin\LoginController@showLoginForm');
    Route::post('login', 'Admin\LoginController@login');
    Route::post('logout', 'Admin\LoginController@logout');

    Route::get('/', 'Admin\HomeController@index');
});

Route::get('fac', 'TestFactoryController@fac');
Route::get('main', 'TestSingleController@main');
Route::get('proto', 'PrototypePatternDemoController@main');

///////////////////
class Baz
{
}

class Bar
{
    public $baz;

    public function __construct(Baz $baz)
    {
        $this->baz = $baz;
    }
}

Route::get('bar', function (Bar $bar) {
    dd($bar->baz);
});

Route::get('eat', function (App\Rice $rice) {
//    dd(\App\RiceFacade::food());
//    return Rice::food();
        dd(rice()->food());
});