<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
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
Route::post('local', function (){
    $local = Request::all('local');
    session(['my_local' => $local['local']]);
    return redirect()->back();
})->name('local');

Route::middleware(['local'])->group(function (){
    Route::get('/', [PostController::class , 'index'])->name('home');
    Route::get('rating', [PostController::class , 'rating'])->name('rating');
    Route::get('view/{id}', [PostController::class , 'show'])->name('view');
    Route::get('photo/{id}', [PostController::class , 'photo'])->name('photo');
    Route::get('create_post', [PostController::class, 'create'])->name('create_post_form');
    Route::post('post_store', [PostController::class, 'store'])->name('store_post_form');
    Route::post('mark', [PostController::class, 'mark'])->name('mark');
    Route::get('image', [PostController::class, 'image'])->name('image');
});

