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
/*
Route::get('/', function () {
    return view('welcome');
});
 */

/* Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    $nama = 'Ryan';
    return view('about', ['nama'=>$nama]);
}); */

/* Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about'); */
Route::get('/', 'AutoPagesController@index');
// Route::get('/about', 'AutoPagesController@about');
// Route::get('/mahasiswa', 'MahasiswaController@index');

// Route::get('/students', 'StudentsController@index');
// Route::get('/students/create', 'StudentsController@create');
// Route::get('/students/{student}', 'StudentsController@show');
// Route::get('/students/{student}/edit', 'StudentsController@edit');
// Route::post('/students', 'StudentsController@store');
// Route::delete('/students/{student}', 'StudentsController@destroy');
// Route::patch('/students/{student}', 'StudentsController@update');
// Route::resource('/students', 'StudentsController')->middleware('auth');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@store');
Route::resource('/register', 'RegisterController');

Route::get('/exportcsv', 'ImportExportController@exportcsv');
Route::get('/exportpdf', 'ImportExportController@exportpdf');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/ktp', 'DataktpController');
    Route::get('/logout', 'LoginController@logout');
    Route::post('/importcsv', 'ImportExportController@importcsv')->name('import');
});
