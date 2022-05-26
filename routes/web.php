<?php

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


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('statuses')->name('statuses/')->group(static function() {
            Route::get('/',                                             'StatusController@index')->name('index');
            Route::get('/create',                                       'StatusController@create')->name('create');
            Route::post('/',                                            'StatusController@store')->name('store');
            Route::get('/{status}/edit',                                'StatusController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StatusController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{status}',                                    'StatusController@update')->name('update');
            Route::delete('/{status}',                                  'StatusController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('ministerios')->name('ministerios/')->group(static function() {
            Route::get('/',                                             'MinisteriosController@index')->name('index');
            Route::get('/create',                                       'MinisteriosController@create')->name('create');
            Route::post('/',                                            'MinisteriosController@store')->name('store');
            Route::get('/{ministerio}/edit',                            'MinisteriosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MinisteriosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ministerio}',                                'MinisteriosController@update')->name('update');
            Route::delete('/{ministerio}',                              'MinisteriosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('cursos')->name('cursos/')->group(static function() {
            Route::get('/',                                             'CursosController@index')->name('index');
            Route::get('/create',                                       'CursosController@create')->name('create');
            Route::post('/',                                            'CursosController@store')->name('store');
            Route::get('/{curso}/edit',                                 'CursosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CursosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{curso}',                                     'CursosController@update')->name('update');
            Route::delete('/{curso}',                                   'CursosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('membros')->name('membros/')->group(static function() {
            Route::get('/',                                             'MembrosController@index')->name('index');
            Route::get('/create',                                       'MembrosController@create')->name('create');
            Route::post('/',                                            'MembrosController@store')->name('store');
            Route::get('/{membro}/edit',                                'MembrosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MembrosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{membro}',                                    'MembrosController@update')->name('update');
            Route::delete('/{membro}',                                  'MembrosController@destroy')->name('destroy');
        });
    });
});