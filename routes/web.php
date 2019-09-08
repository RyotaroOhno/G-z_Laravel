<?php

use App\Blog;
use Illuminate\Http\Request;

//トップページの表示
Route::get('/', 'BlogController@index');

//投稿画面へ遷移
Route::post('/addBlog/{blog}','BlogController@addcontent');
   

//記事の投稿
Route::post('/blogs','BlogController@post');


//Good Job
Route::post('/blog/good','BlogController@good');


//記事の削除
Route::post('/blog/{blog}','BlogController@destroy');

