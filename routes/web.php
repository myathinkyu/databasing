<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/update', function(){
    $result = DB::update('update post set title=? where id=?', ['Laravel', 1]);
    return "$result";
});


Route::get('/read', function(){
    $result = DB::select('select * from post');
    $var = "";
    foreach($result as $post){
        $var .= $post->title . '<br>' . $post->content . '<br>';
    }
    return $var;
});

Route::get('/insert', function(){
    DB::insert("insert into post (title,content) value(?,?)", 
    ["Laravel", "Laravel is a web application framework with expressive, elegant syntax."]);
    DB::insert("insert into post (title,content) value(?,?)", 
    ["Java", "Java is a multi-platform, object-oriented, and network-centric language that can be used as a platform in itself."]);
});

