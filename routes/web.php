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
Route::get('/profile', 'user\HomeController@profile')->name('user.profile');
Route::get('/plans', 'user\HomeController@planView')->name('user.plan');
Route::get('/subscribe-plan/{plan}', 'user\HomeController@subscribeView')->name('subscribe-plan');

Route::post('/update-profile', 'user\HomeController@updateProfile')->name('user.update.profile');
Route::post('/update-password', 'user\HomeController@updatePassword')->name('user.update.password');
// Download Route
Route::get('download/{filename}', function($filename)
{
    // Check if file exists in app/storage/file folder
    $file_path = base_path().'/'.$filename;
	// exit($file_path);
    if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        // Error
        exit('Requested file does not exist on our server!');
    }
})
->where('filename', '[A-Za-z0-9\-\_\.]+');
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
    Route::get('/transaction', 'admin\TransactionController@index')->name('transaction.index');

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
