<?php

use App\Http\Livewire\Article\Article;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Index\Index;
use App\Http\Livewire\Search\Search;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

 
Route::get('/', Index::class);
Route::get('/article/{id}', Article::class)->name('article');
Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/register', Register::class)->name('register')->middleware('guest');
Route::get('/logout', function(){
 Auth::logout();
 return redirect('/');
}
)->name('logout');
Route::get('/search/{catId}/{char?}', Search::class)->name('search');