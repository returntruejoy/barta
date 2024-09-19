<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\Auth\RegisterController;

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/register', [RegisterController::class, 'register']);
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
