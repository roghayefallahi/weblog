<?php

use App\Http\Livewire\Article\Article;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Regirter;
use App\Http\Livewire\Index\Index;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', Index::class);
Route::get('/article/{id}', Article::class)->name('article');
Route::get('/login', Login::class)->name('login');
//Route::get('/register', Regsirter::class)->name('register');