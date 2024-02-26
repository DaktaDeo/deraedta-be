<?php

use App\Http\Controllers\Controller;
use DaktaDeo\LaravelMultipassConnector\Repositories\WebsiteRepository;
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

Route::get('/', [Controller::class, 'show'])->name('home');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

//require __DIR__.'/auth.php';

Route::get('/articles-2', function () {
    // test route to check if the query endpoint in MP is working
    // mock a webmenu item
    $query = 'filter[labels.id]=81,84&include=labels';
    //    $query ='filter[title]=test';

    return app(WebsiteRepository::class)->query($query);
});

Route::get('/{any?}', [Controller::class, 'show'])->where([
    'any' => '.+',
])->name('any');
