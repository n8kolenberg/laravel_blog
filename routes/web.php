<?php
use App\Task;
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

//Route::get('/', 'TasksController@index');

//Route::get('/tasks/{task}', 'TasksController@show');

Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');

Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts', 'PostsController@store');



//Controller => Plural => Posts
//Eloquent Model => Singular => Post
//Migration => create_posts_table

/*
 * Basic REST crash course => Check the test TasksController for details on the RESTful functions => to create such a controller
 * add -r to php artisan make:controller TasksController -r
 * If you would like to see all posts => GET /posts
 * If you want to create a new post => GET /posts/create
 * You would then need to store the post => POST /posts => call the controller method 'store'
 * If you would like to edit a post => GET /posts/{id}/edit => This would show another form on a page where you can edit
 * That would then submit a PATCH request to /posts/{id} => PATCH /posts/{id}
 * If you would like to delete a post => DELETE /posts/{id}
 *
 * */