<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController; // تأكد من وجود هذا السطر

// المسارات العامة (بدون تسجيل دخول)
Route::get('/login', function () { return view('login'); })->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('dashboard');
    }
    return back()->withErrors(['email' => 'البيانات غير صحيحة']);
});

// منطقة الداشبورد (تحتاج تسجيل دخول)
Route::middleware(['auth'])->group(function () {
    
    // 1. المسارات الثابتة أولاً
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

    // 2. المسارات المتغيرة (ID) ثانياً
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    // 3. الخروج
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});