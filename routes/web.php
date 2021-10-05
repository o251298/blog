<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['local', 'auth'])->group(function (){
    Route::get('/', [PostController::class , 'index'])->name('home');
    Route::get('rating', [PostController::class , 'rating'])->name('rating');
    Route::get('view/{id}', [PostController::class , 'show'])->name('view');
    Route::get('photo/{id}', [PostController::class , 'photo'])->name('photo');
    Route::get('create_post', [PostController::class, 'create'])->name('create_post_form');
    Route::post('post_store', [PostController::class, 'store'])->name('store_post_form');
    Route::post('mark', [PostController::class, 'mark'])->name('mark');
    Route::get('image', [PostController::class, 'image'])->name('image');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
});

# AUTH ROUTES
Route::get('login', function (){
    if (Auth::check()){
        return redirect('profile');
    }
    return view('user.login', [
        'title' => 'Login | app'
    ]);
})->name('login_form')->middleware('local');
Route::get('register', function (){
    if (Auth::check()){
        return redirect('profile');
    }
    return view('user.register', [
        'title' => 'Register | app'
    ]);
})->name('register_form')->middleware('local');

Route::post('login', [UserController::class, 'login'])->name('login')->middleware('local');
Route::post('register', [UserController::class, 'register'])->name('register')->middleware('local');
Route::get('logout', function (){
    Auth::logout();
    return redirect()->route('login');
})->name('logout')->middleware('local');
Route::get('reset_password', function (){

    return view('user.reset_password');
})->middleware('local')->name('reset_password');
Route::post('new_password', [UserController::class, 'newPassword'])->middleware('local')->name('new_password');

