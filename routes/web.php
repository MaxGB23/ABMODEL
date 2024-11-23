<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', function () {
    return view('app');
});

Route::get('/admin', function () {
    return redirect('/admin/login');
});

// Puedes definir aquí la ruta hacia la vista de login en Inertia
Route::get('/admin/login', function () {
    return Inertia::render('Admin/Login'); // Asegúrate de tener un componente Vue `Login` dentro de tu carpeta de `Admin`
});

// Route::get('/admin', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $activeUsers = User::count(); // Cuenta todos los usuarios

    return Inertia::render('Dashboard', [
        'activeUsers' => $activeUsers,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('users', UserController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('contactos', ContactoController::class);
    Route::resource('servicios', ServicioController::class);
    // Route::resource('servicios', ServicioController::class);
});





// Route::get('/', function () {
//     return Inertia::render('Home');
// });

// Route::get('/about', function () {
//     return Inertia::render('About');
// });

// Route::get('/contact', function () {
//     return Inertia::render('Contact');
// });

// Route::get('/services', function () {
//     return Inertia::render('Services');
// });

// Route::get('/faq', function () {
//     return Inertia::render('FAQ');
// });

// // Ruta para manejar páginas no encontradas
// Route::fallback(function () {
//     return Inertia::render('NotFound');
// });

require __DIR__.'/auth.php';
