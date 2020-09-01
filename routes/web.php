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

//Auth::routes();

Route::get('signin', 'Auth\LoginController@login')->name('login');
Route::post('signin', 'Auth\LoginController@authenticate')->name('login');
Route::get('signout', 'Auth\LoginController@logout')->name('logout');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('signup', 'Auth\RegisterController@register')->name('register');
Route::post('/subscribe', 'user\HomeController@subscribe')->name('subscribe');

Route::get('/home', 'user\HomeController@index')->name('user.home');
Route::get('/subscribe-plan/{plan}', 'user\HomeController@subscribeView')->name('subscribe-plan');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/home','admin\HomeController@index')->name('home');

    // General Settings
    Route::get('/change-profile', 'admin\StaffController@changeprofile')->name('change.profile');
    Route::post('/profile/update', 'admin\StaffController@updateprofile')->name('profile.update');
    Route::post('/password/update', 'admin\StaffController@updatepass')->name('password.update');
    Route::get('/stuff-management','admin\StaffController@stuffManagement')->name('stuff.home');
    Route::post('/delete-admin', 'admin\StaffController@deleteAdmin')->name('admin.delAdmin');

    //User Management
    Route::get('/users', 'admin\UserController@index')->name('users');
    Route::post('/user/search', 'admin\UserController@userSearch')->name('search.users');
    Route::get('/user/{user}', 'admin\UserController@single')->name('user.single');
    Route::post('/user/balance/{user}', 'admin\UserController@blupdate')->name('user.balance');
    Route::put('/user/status/{user}', 'admin\UserController@statupdate')->name('user.status');
    Route::get('/user-translog', 'admin\UserController@transLog')->name('users.transactions');
    Route::get('/users/create', 'admin\UserController@createUserIndex')->name('users.create.get');
    Route::post('/users/create', 'admin\UserController@createUser')->name('users.create');

    //Transaction Management
    Route::get('/transaction-deposit', 'AdminTransactionController@deposit')->name('transaction.deposit');
    Route::get('/transaction-withdrawal', 'AdminTransactionController@withdrawal')->name('transaction.withdrawal');
    Route::get('/withdrawal-confirm', 'AdminTransactionController@withdrawConfirm')->name('transaction.withdrawal.confirm');
    Route::post('/confirmWithdrawal', 'AdminTransactionController@confirmWithdrawal')->name('transaction.withdrawal.confirmWithdrawal');
    Route::get('/transaction-settings', 'AdminTransactionController@transactionSetting')->name('transaction.setting');
    Route::post('/coin-activate', 'AdminTransactionController@coinActivate')->name('transaction.coin.activate');
    Route::post('/withdrawalLimit', 'AdminTransactionController@withdrawalLimit')->name('transaction.coin.withdrawalLimit');
    Route::post('/confirmMethod', 'AdminTransactionController@confirmMethod')->name('transaction.coin.confirmMethod');

    //Admin Auth
    Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'AdminAuth\RegisterController@register');

    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.email');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

    Route::resource('plans','admin\PlanController');

});
