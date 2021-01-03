<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Honeypot\Honeypot;
use App\Http\Controllers\Covid19Controller;

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

Route::get('/posts/create', function () {
    return view('posts.create');
})->middleware('auth')->name('posts.create');

Route::post('/posts', function () {
    Post::create(
        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ])
    );

    return 'Published';
})->middleware(['auth', Honeypot::class]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/covid19', [Covid19Controller::class, 'index'])->name('covid19.index');
Route::get('/covid19/create', [Covid19Controller::class, 'create'])->name('covid19.create');
