<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServicioRequest;
use App\Http\Requests\UpdateServicio;

use App\Http\Resources\ServicioResource;
use App\Http\Resources\CategoriaResource;
use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Categoria;
use Database\Seeders\ServicioSeeder;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\search;

class ServicioController extends Controller
{
    public function index(Request $request)
    {
        $serviciosQuery = Servicio::query();
        $this->applySearch($serviciosQuery, $request->search);

        $servicios = ServicioResource::collection($serviciosQuery->paginate(5));

        return inertia('Servicios/Index', [
            'servicios' => $servicios,
            'search' => $request->search ?? ''
        ]);
    }

    protected function applySearch($query, $search)
    {
        return $query->when($search, function ($query, $search) {
            $query->where('servicio', 'like', '%' . $search . '%');
        });
    }

    public function create()
    {
        $servicios = ServicioResource::collection(Servicio::all());
        // $categorias = CategoriaResource::collection(Categoria::paginate(5)->items());
        $categorias = Categoria::all(); // Esto devuelve un array puro

        return inertia('Servicios/Create', [
            'servicios' => $servicios,
            'categorias' => $categorias,

        ]);
    }

    // public function store(StoreServicioRequest $request)
    // {
    //     // Validar los datos entrantes
    //     $data = $request->validated();

    //     // Si hay una imagen, guardarla en el almacenamiento público
    //     if ($request->hasFile('image_path')) {
    //         // Guardar la imagen en la carpeta 'images' dentro de 'public' y obtener la ruta
    //         $imagePath = $request->file('image_path')->store('images', 'public');

    //         // Agregar la ruta de la imagen a los datos
    //         $data['image_path'] = $image_path;
    //     }

    //     // Crear el servicio con los datos validados, incluyendo la ruta de la imagen si se subió
    //     Servicio::create($data);

    //     return redirect()->route('servicios.index');
    // }

    public function store(StoreServicioRequest $request)
{
    // Validar los datos entrantes
    $data = $request->validated();

    // Si hay una imagen, guardarla en el almacenamiento público
    if ($request->hasFile('image_path')) {
        // Guardar la imagen en la carpeta 'images' dentro de 'public' y obtener la ruta
        $imagePath = $request->file('image_path')->store('images', 'public');

        // Agregar la ruta de la imagen a los datos
        $data['image_path'] = $imagePath; // Aquí se usa $imagePath en lugar de $image_path
    }

    // Crear el servicio con los datos validados, incluyendo la ruta de la imagen si se subió
    Servicio::create($data);

    return redirect()->route('servicios.index');
}


    public function edit(Servicio $servicio)
    {
        $categorias = Categoria::all();

        return inertia('Servicios/Edit', [
            'servicio' => ServicioResource::make($servicio),
            'categorias' => $categorias,
            'image_path' => asset('storage/' . $servicio->image_path)
        ]);
    }

    public function update(UpdateServicio $request, Servicio $servicio)
    {
        $data = $request->validated();

        if ($request->hasFile('image_path')) {
            Storage::delete('public/' . $servicio->image_path);
            $data['image_path'] = $request->file('image_path')->store('images', 'public');
        }

        $servicio->update($data);

        return redirect()->route('servicios.index');
    }

    // public function update(UpdateServicio $request, Servicio $servicio)
    // {

    //     $image_path = $servicio->image_path;
    //     if(Request::file('image_path')){
    //         Storage::delete('public/'. $servicio->image_path);
    //     }

    //     $data = $request->validated();
    //     $data['image_path'] = $request->image_path;
    //     $servicio->update($data);

    //     // $servicio->update([
    //     //     'image_path' => $request->image_path,

    //     // ]);
    //     // $servicio->update($request->validated());
    //     return redirect()->route('servicios.index');

    //     // dd($request->all());
    //     // $servicio->update($request->validated());
    //     // return redirect()->route('servicios.index');
    // }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index');
    }
}
