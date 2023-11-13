<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Hacky;
use App\Models\Post;

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

Route::get('/all', function(){
    $posts = Post::all();
    foreach($posts as $post){
        echo $post->title . "<br>". $post->content . "<br>";
    }
});

Route::get('/find', function(){
    //$posts = Post::find(3);
    //$posts = Post::where('is_admin',1)->get();

    //$posts = Post::findOrFail(5);
    // $post = new Post;
    // $post->title = "React";
    // $post->content = "React is a place where you can ask for help, find opportunities, and meet new friends.";

    // $post -> save();

    $posts = Post::all();
    return $posts;
});

Route::get('/create', function(){
    Post::create(['title'=>'React', 'content'=>'React is a place where you can ask for help, find opportunities, and meet new friends.']);
});

//Route::get('/delete', function(){
    // $post = Post::find(9);
    // $post->delete();

    //Post::destroy(8);

    //Post::destroy([5,6,7]);
//});

Route::get('/forcedelete', function(){
    Post::onlyTrashed()->where('id',10)->forceDelete();
});

Route::get('/softdelete', function(){
    $post = Post::find(2);
    $post->delete();
});

Route::get('/findsoftdelete', function(){
    //$posts = Post::withTrashed()->where('id',1)->get();
    $posts = Post::onlyTrashed()->where('id',12)->get();
    return $posts;
});

Route::get('/restore', function(){
    Post::onlyTrashed()->where('id',4)->restore();
});

// Route::get('/delete/{id}', function($id){
//     $result = DB::delete('delete from posts where id=?', [$id]);
//     return $result;
// });

// Route::get('/update', function(){
//     $result = DB::update('update posts set title=? where id=?', ['Laravel', 1]);
//     return "$result";
// });

// Route::get('/update', function(){
//     $post = Post::find(9);
//     $post->title = "PHP";
//     $post->content = "PHP is a server-side language because php requires a server to run code.";

//     $post->save();

// });

Route::get('/update', function(){
    Post::where('id',9)->where('is_admin',0)->update(['title'=>'Laraval','content'=>'Laravel is a web application framework with expressive, elegant syntax.']);
});

// Route::get('/read', function(){
//     $result = DB::select('select * from posts');
//     $var = "";
//     foreach($result as $post){
//         $var .= $post->title . '<br>' . $post->content . '<br>';
//     }
//     return $var;
// });

Route::get('/insert', function(){
    DB::insert("insert into hackies (title,content) value(?,?)", 
    ["Model", "Testing 3"]);
    DB::insert("insert into hackies (title,content) value(?,?)", 
    ["PHP", "Testing 4"]);
});

