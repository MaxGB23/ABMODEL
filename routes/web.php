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
use App\Models\Servicio;
use App\Models\Faq;
use App\Models\Contacto;

// Route::get('/', function () {
//     return view('app');
// });

Route::get('/', function () {
    return Inertia::render('Home'); // Asegúrate de tener un componente Vue `Login` dentro de tu carpeta de `Admin`
})->name('/');

// Route::get('/services2', function () {
//     return Inertia::render('Services');
// })->name('services2');

Route::get('/admin', function () {
    return redirect('/admin/login');
});

// Puedes definir aquí la ruta hacia la vista de login en Inertia
Route::get('/admin/login', function () {
    return Inertia::render('Admin/Login'); // Asegúrate de tener un componente Vue `Login` dentro de tu carpeta de `Admin`
});


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


Route::get('/services', function () {
    $services = Servicio::all()->map(function ($service) {
        return [
            'id' => $service->id,
            'title' => $service->servicio,
            'description' => $service->descripcion,
            'image_path' => asset('storage/' . $service->image_path),
            'precio' => $service->precio,
        ];
    });
    return Inertia::render('Services', ['services' => $services]);
})->name('services');;


Route::get('/faq', function () {
    $faqs = Faq::all()->map(function ($faq) {
        return [
            'id' => $faq->id,
            'pregunta' => $faq->pregunta,
            'respuesta' => $faq->respuesta,
        ];
    });

    return Inertia::render('FAQ', ['faqs' => $faqs]);
})->name('faq');;




// Route::get('/', function () {
//     return Inertia::render('Home');
// });

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/contact', function () {


    return Inertia::render('Contact');
})->name('contact');




// Ruta para manejar páginas no encontradas
Route::fallback(function () {
    return Inertia::render('NotFound');
});

require __DIR__.'/auth.php';
