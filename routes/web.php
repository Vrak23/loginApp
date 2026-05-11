<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Google
Route::get('/login/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('/login/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = User::updateOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName(),
            'password' => bcrypt('google-auth-' . $googleUser->getId()),
        ]
    );

    Auth::login($user);
    return redirect('/dashboard');
});

// GitHub
Route::get('/auth/github', function () {
    return Socialite::driver('github')->redirect();
})->name('login.github');

Route::get('/auth/github/callback', function () {
    $githubUser = Socialite::driver('github')->stateless()->user();

    $user = User::updateOrCreate(
        ['email' => $githubUser->getEmail()],
        [
            'name' => $githubUser->getName() ?? $githubUser->getNickname(),
            'password' => bcrypt('github-auth-' . $githubUser->getId()),
        ]
    );

    Auth::login($user);
    return redirect('/dashboard');
});

// Facebook
Route::get('/login/facebook', function () {
    return Socialite::driver('facebook')
        ->setScopes(['public_profile'])
        ->redirect();
})->name('login.facebook');

Route::get('/login/facebook/callback', function () {
    $facebookUser = Socialite::driver('facebook')->stateless()->user();

    $email = $facebookUser->getEmail();

    if (!$email) {
        $email = 'facebook_' . $facebookUser->getId() . '@facebook.com';
    }

    $user = User::updateOrCreate(
        ['email' => $email],
        [
            'name' => $facebookUser->getName(),
            'password' => bcrypt('facebook-auth-' . $facebookUser->getId()),
        ]
    );

    Auth::login($user);
    return redirect('/dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/alumnos', [AlumnoController::class, 'index'])->name('web.alumnos.index');
    Route::get('/cursos', [CursoController::class, 'index'])->name('web.cursos.index');
    Route::get('/profesores', [ProfesorController::class, 'index'])->name('web.profesores.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
