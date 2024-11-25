<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactoRequest;
use App\Http\Requests\UpdateContacto;

use App\Http\Resources\ContactoResource;
use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{


    public function index(Request $request)
    {
        $contactosQuery = Contacto::query();
        $this->applySearch($contactosQuery, $request->search);

        $contactos = ContactoResource::collection($contactosQuery->paginate(5));

        return inertia('Contactos/Index', [
            'contactos' => $contactos,
            'search' => $request->search ?? ''
        ]);
    }

    protected function applySearch($query, $search)
    {
        return $query->when($search, function($query, $search) {
            $query->where('nombre','like','%'.$search.'%');
        });
    }

    public function create()
    {
        $contactos = ContactoResource::collection(Contacto::all());

        return inertia('Contactos/Create', [
            'contactos' => $contactos,

        ]);
    }

    public function store(StoreContactoRequest $request)
    {
        Contacto::create($request->validated());

        // return redirect()->route('contactos.index');
    }

    public function add(StoreContactoRequest $request)
{
    Contacto::create($request->validated());
    return redirect()->route('contact');
}



    public function edit(Contacto $contacto)
    {
        // $Contactos = FaqResource::collection(Contacto::all());
        return inertia('Contactos/Edit', [
            'contacto' => ContactoResource::make($contacto),
        ]);
    }

    public function update(UpdateContacto $request, Contacto $contacto)
    {
        $contacto->update($request->validated());

        return redirect()->route('contactos.index');
    }

    public function destroy(Contacto $contacto)
    {
        $contacto->delete();
        return redirect()->route('contactos.index');
    }

    public function show($id)
    {
        return redirect()->route('contactos.index');
    }
}
