<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;

use App\Http\Resources\CategoriaResource;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Database\Seeders\CategoriaSeeder;

use function Laravel\Prompts\search;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $categoriasQuery = Categoria::query();
        $this->applySearch($categoriasQuery, $request->search);

        $categorias = CategoriaResource::collection($categoriasQuery->paginate(5));

        return inertia('Categorias/Index', [
            'categorias' => $categorias,
            'search' => $request->search ?? ''
        ]);
    }

    protected function applySearch($query, $search)
    {
        return $query->when($search, function($query, $search) {
            $query->where('categoria','like','%'.$search.'%');
        });
    }

    public function create()
    {
        $categorias = CategoriaResource::collection(Categoria::all());

        return inertia('Categorias/Create', [
            'categorias' => $categorias,

        ]);
    }

    public function store(StoreCategoriaRequest $request)
    {
        Categoria::create($request->validated());

        return redirect()->route('categorias.index');
    }

    public function edit(Categoria $categoria)
    {
        // $categorias = CategoriaResource::collection(Categoria::all());

        return inertia('Categorias/Edit', [
            'categoria' => CategoriaResource::make($categoria),
        ]);
    }

    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $categoria->update($request->validated());

        return redirect()->route('categorias.index');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }


}
