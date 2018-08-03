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
Route::get('/index', 'ShopcategoriesController@index');
//商家分类
Route::resource('shopCategories', 'ShopCategoriesController');

Route::resource('user', 'UserController');
//Route::get('/users', 'UsersController@index')->name('users.index');//用户列表
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');//查看单个用户信息
//Route::get('/users/create', 'UsersController@create')->name('users.create');//显示添加表单
//Route::post('/users', 'UsersController@store')->name('users.store');//接收添加表单数据
//Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');//修改用户表单
//Route::patch('/users/{user}', 'UsersController@update')->name('users.update');//更新用户信息
//Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');//删除用户信息
Route::get('/user/{user}/qy', 'UserController@qy')->name('user.qy');//启用

Route::resource('admin', 'AdminsController');

Route::get('/', 'SessionsController@create')->name('Sessions.login');//显示登录页面
Route::post('/login', 'SessionsController@store')->name('up.login');//创建新会话（登录）
Route::get('/login', 'SessionsController@create')->name('login');//创建新会话（登录）
Route::delete('logout', 'SessionsController@destroy')->name('logout');//销毁会话（退出登录）
//修改密码
Route::get('/admin/{edit}/pwd','AdminsController@pwd')->name('admin.pwd');//修改密码表单
Route::patch('/admin', 'AdminsController@save')->name('admin.save');//更新密码信息
//重置密码
Route::get('/user/{user}/pwd','UserController@pwd')->name('user.qz');//修改密码表单
Route::patch('/user/{user}/save', 'UserController@save')->name('user.save');//更新密码信息
//会员管理
Route::resource('member', 'MembersController');
Route::get('/member/{member}/pwd','MembersController@pwd')->name('member.qz');//修改密码表单
Route::patch('/member/{member}/save', 'MembersController@save')->name('member.save');//更新密码信息
Route::get('/member/{member}/qy', 'MembersController@qy')->name('member.qy');//启用会员账号

//统计菜品
Route::get('/count', 'ShopsController@count')->name('shops.count');//菜品列表
Route::get('/count_day', 'ShopsController@count_day')->name('shops.count_day');//菜品列表(日)
Route::get('/count_month', 'ShopsController@count_month')->name('shops.count_month');//菜品列表(月)
//统计订单
Route::get('/mc', 'ShopsController@shop_count')->name('shops.mc');//菜品列表
Route::get('/mc_day', 'ShopsController@shop_count_day')->name('shops.mc_day');//菜品列表(日)
Route::get('/mc_month', 'ShopsController@shop_count_month')->name('shops.mc_month');//菜品列表(月)
//权限管理
Route::resource('Rbac', 'RbacController');
//角色管理
Route::resource('Role', 'RoleController');
//导航栏管理
Route::resource('Nav', 'NavController');
//发邮件
Route::get('/send','UserController@send');
//抽奖活动表 events
Route::resource('Event', 'EventController');
//活动报名表 event_members
Route::resource('EventMember', 'EventMemberController');
