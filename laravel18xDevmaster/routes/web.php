<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return 'hello world';
});

Route::get('/devmaster', function () {
    return "<h1> welcom to, devmaster academy! </h1>";
});

Route::redirect('/here', '/there');
Route::get('/there', function () {
    return '<h1> redirect: here to there</h1>';
});

Route::get('/vu-linh', function () {
    return view('vulinh');
});



Route::get('/devmaster/{id}', function (string $id) {
    return '<h1> devmaster '.$id;
});



Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
    return '<h1> post: $postId ; comment:$commentId';
});


use Illuminate\Http\Request;
 
Route::get('/user/{id}', function (Request $request, string $id) {
    return '<h1> User -> '.$id;
});



Route::get('/dev/{name?}', function (?string $name = null) {
    return "<h1> welcome to, $name";
});


Route::get('/user-dev/{name?}', function (?string $name = 'vulinh') {
    return "<h1> welcome to, $name";
});


Route::get('/user-constraint/{name}', function (string $name) {
    return "<h1> route constraint [A-Za-z]+";
})->where('name', '[A-Za-z]+');


Route::get('/user-constraint/{id}', function (string $id) {
    return "<h1> route constraint [0-9]+";
})->where('id', '[0-9]+');




Route::get('/user-constraint/{id}/{name}', function (string $id, string $name) {
    return "<h1> route constraint ['id' => '[0-9]+', 'name' => '[a-z]+']";
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);



Route::get('/user-check/{id}/{name}', function (string $id, string $name) {
    return "<h1> user-check wherenumber('id')->whereAlpha('name') [$id, $name]";
})->whereNumber('id')->whereAlpha('name');




Route::get('/user-check/{name}', function (string $name) {
    return "<h1> user-check whereAlphaNumeric('name') => [$name]";
})->whereAlphaNumeric('name');





Route::get('/user-check/{id}', function (string $id) {
    return "<h1> user-check whereUuid('id') => [$id]";
})->whereUuid('id');



Route::get('/search/{search}', function (string $search) {
    return "<h1> tham so tren url laf unicode: $search </h1>";
})->where('search', '.*');



Route::get('/named/profile', function () {
    return "<h1> dat ten route </h1>";
})->name('named.profile');


Route::get(
    '/named/display',
    [UserProfileController::class, 'display']
)->name('display.profile');

Route::get('/named/show',[UserProfileController::class, 'show']);



Route::group(['prefile'=>'admin'],function(){
    route::get('/',function(){return "<h1> admin home </h1>";});
    route::get('/account',function(){return "<h1> admin account </h1>";});
    route::get('/product',function(){return "<h1> admin  </h1>";});
});
