<?php
use App\Post;
use App\User;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');

});

Route::get('/stepy', 'PostsController@stepy');


Route::get('/about', function () {
    return "<h1>About</h1>";

});

Route::get('/share/{id}', function($id){
    return "this is post no" . $id;
});

Route::get('admin/posts/example',array('as'=>'admin.home', function(){
    $url=route('admin.home');
    return $url;
}));
//Route::get('/post/{id}','PostsController@index');
//Route::resource('post','PostsController');

Route::get('post/{id}','PostsController@show_post');

Route::get('/insert',function (){
    DB::insert('insert into posts (title,body)value(?,?)',['php with laravel','Larave je mnogo kul bla bla bla']);
});
//
//Route::get('/update',function (){
//    $update=DB::update('update posts set title="update title" where id=?',[1]);
//    return $update;
//});
//Route::get('/delete/{id}',function ($id){
//    $delete=DB::delete('delete from posts where id=?',[$id]);
//});

/* eloquent */
//Route::get('/find',function (){
//    $posts=Post::find(4);
//    return $posts->title;
////    foreach($posts as $post){
////        return $post->title;
////    }
//});
//Route::get('/find',function(){
//    $posts=Post::where('id',4)->orderBy('id','desc')->take(1)->get();
//    return $posts;
//});

//Route::get('/findmore',function (){
////    $posts=Post::findOrFail(4);
////    return $posts;
//
//    $post=Post::where('id','<','3')->get();
//    return $post;
//});
//Route::get('/basicinsert',function (){
//   $post=Post::find(3);
//   $post->title='Ovo je eloquent editovan';
//   $post->body='Kullllllllllllll';
//   $post->is_admin=0;
//   $post->save();
//});

//Route::get('/create',function (){
//    Post::create(['title'=>'Kreirano sa create metodom','body'=>'Naucio sam dosta','is_admin'=>0]);
//
//});

//Route::get('/update',function (){
//    Post::where('id','4')->update(['title'=>'new php update']);
//
//});
//Route::get('/delete',function (){
//    $post=Post::find(3);
//    $post->delete();
//
//});
//Route::get('/delete',function (){
//    Post::destroy([4,5]);
//});


//Route::get('readsoftdelete',function(){
////    $post=Post::find(6);
////    return $post;
//    $post=Post::withTrashed()->where('id',6)->get();
//    return $post;
//});

Route::get('/restore','PostsControler@restoresoft');

//Route::get('/forcedelete',function (){
//    Post::withTrashed()->where('id',7)->forceDelete();
//
//});
//

//Route::get('/user/{id}/posts',function ($id){
//    return User::find($id)->post;
//});

//Route::get('/post/{id}/users',function ($id){
//    return Post::find($id)->user->name;
//});

Route::get('/user/{id}/role',function ($id){
    $user=User::find($id);

    foreach ($user->role as $role){
        return $role->name;
    }
});
Route::auth();

Route::get('/home', 'HomeController@index');
