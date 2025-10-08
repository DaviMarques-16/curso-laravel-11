<?php


use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckIfIsAdmin;
use Illuminate\Support\Facades\Route;



//só usuários logados terão acesso às funções com middleware auth
Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {
        Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy')
        ->middleware(CheckIfIsAdmin::class);
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        //indica a rota para o controller
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        //classe do usercontroller, action index, nome da rota (nome exclusivo para caso mude a url)

        // Rota -> Controller -> Busca do banco de dados -> joga pra view (html, json)
        });

Route::middleware('auth')
    ->group(function() {
        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/profile', [PostController::class, 'profile'])->name('posts.profile');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

        Route::post('/posts/{post}/comments', [CommentsController::class, 'store'])->name('comments.store');
        Route::delete('comments/{comment}', [CommentsController::class, 'store'])->name('comments.destroy');
    });


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';