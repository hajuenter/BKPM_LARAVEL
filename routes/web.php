<?php

use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

//Route with name
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Basic route
Route::get('/foo', function () {
    return 'Hellow World';
});

//Route with parameter
Route::get('/foo/{id}', function ($id) {
    return 'User ' . $id;
});

//Route with parameter filled
Route::get('/fooid/{id?}', function ($id = 23) {
    return 'User ' . $id;
});

//Route with parameter checking
Route::get('/halo/{id?}', function ($id = 'Parameter kosong') {
    return $id;
});

//Route call view from controller
Route::get('/user', [UserController::class, 'viewUser'])->name('user');

//Route method post
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

//Route redirect
Route::redirect('/welcome', '/');

//Route redirect with status
Route::redirect('/welcome301', '/', 301); //Moved Permanently
Route::redirect('/welcome302', '/', 302); //Found (Temporary Redirect)
Route::redirect('/welcome303', '/', 303); //See Other
Route::redirect('/welcome307', '/', 307); //Temporary Redirect
Route::redirect('/welcome308', '/', 308); //Permanent Redirect

//Route with Regular Expression Constraints
Route::get('/hai/{name}', function ($name) {
    return "Halo, $name!";
})->where('name', '[A-Za-z]+');

//Route with Global Constraints take it from providers
Route::get('/nameGlobal/{nameGlobal}', function ($nameGlobal) {
    return "Halo, $nameGlobal!";
});
Route::get('/idGlobal/{idGlobal}', function ($idGlobal) {
    return "User ID: $idGlobal";
});

//Route Encoded Forward Slashes
Route::get('/search/{search}', function ($search) {
    return $search;
})->where('search', '.*');

//Generate URL ke Route Bernama
Route::get('/profile', [UserController::class, 'showProfile'])->name('profileya');
Route::get('/generate-url', [UserController::class, 'generateProfileUrl']);
Route::get('/redirect-profile', [UserController::class, 'redirectToProfile']);
Route::get('/params/{id?}', function ($id) {
    return "ID yang diterima: " . $id;
})->name('params_id');
Route::get('/test-url', function () {
    $url = route('params_id', ["id" => 5]);
    dd($url);
});

//Check route
Route::get('/profileCek', [UserController::class, 'showProfile'])
    ->name('profile')
    ->middleware('check.route'); //di ambil dari app / dulu kernel

//Route group with middleware
Route::middleware(['check.user'])->group(function () {
    Route::get('/dashboardLogin', [UserController::class, 'dashboardL'])->name('dashboard');
    Route::get('/profileLogin', [UserController::class, 'profileL'])->name('profile');
    Route::get('/settingsLogin', [UserController::class, 'settingsL'])->name('settings');
});

//Route group with namespace
Route::namespace('App\Http\Controllers\User')->group(function () {
    Route::get('/user/info', 'UserController@info')->name('user.info');
    Route::get('/user/data', 'DataController@data')->name('user.data');
});

//Subdomain routing
Route::domain('{account}.example.com')->group(function () {
    Route::get('/', function ($account) {
        return "Ini halaman untuk akun: " . $account;
    });
});

//Route previx
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Ini halaman dashboard admin.";
    });
    Route::get('/db', function () {
        return "Ini halaman db admin.";
    });
});

//Route name previx
Route::name('pre')->prefix('cobalagi')->group(function () {
    Route::get('/dashboard', function () {
        return "Ini halaman dashboard previx name.";
    })->name('pv.dashboard');

    Route::get('/user', function () {
        return "Ini halaman daftar pengguna previx name.";
    })->name('pv.user');
});

//Method Route
// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);

//Route group with controller
// Route::controller(RegisterController::class)->group(function () {
//     Route::get('/register', 'showRegistrationForm')->name('register');
//     Route::post('/register', 'register');
// });

Route::resource('mguser', ManagementUserController::class);
// Route::get('/home', function () {
//     return view('home');
// });
Route::get('/home', [ManagementUserController::class, 'index']);

Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {
    Route::resource('home', 'HomeController');
});
