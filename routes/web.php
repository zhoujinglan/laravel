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

Route::get("article/index",'ArticleController@index')->name("article.index");
Route::any("article/add",'ArticleController@add')->name("article.add");
Route::any("article/edit/{id}",'ArticleController@edit')->name("article.edit");
Route::get("article/del/{id}",'ArticleController@del')->name("article.del");

//文章分类
Route::get("class/index",'AtricleCategoryController@index')->name("class.index");
Route::any("class/add",'AtricleCategoryController@add')->name("class.add");
Route::any("class/edit/{id}",'AtricleCategoryController@edit')->name("class.edit");
Route::get("class/del/{id}",'AtricleCategoryController@del')->name("class.del");


//商品分类
Route::get("category/index",'GoodsCategoryController@index')->name("category.index");
Route::any("category/add",'GoodsCategoryController@add')->name("category.add");
Route::any("category/edit/{id}",'GoodsCategoryController@edit')->name("category.edit");
Route::get("category/del/{id}",'GoodsCategoryController@del')->name("category.del");

//商品列表
Route::get("goods/index",'GoodsController@index')->name("goods.index");
Route::any("goods/add",'GoodsController@add')->name("goods.add");
Route::any("goods/edit/{id}",'GoodsController@edit')->name("goods.edit");
Route::get("goods/del/{id}",'GoodsController@del')->name("goods.del");
Route::get("goods/look/{id}",'GoodsController@look')->name("goods.look");


//用户注册
Route::get("user/index",'UserController@index')->name("user.index");
Route::any("user/reg",'UserController@reg')->name("user.reg");
Route::any("user/edit/{id}",'UserController@edit')->name("user.edit");
Route::get("user/del/{id}",'UserController@del')->name("user.del");