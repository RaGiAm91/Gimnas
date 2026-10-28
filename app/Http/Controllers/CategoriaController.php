<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();

        return view('categorias.index', ['categorias' => $categorias]);
        
    }

    public function show($id)
    {
        $categoria = Categoria::with('exercicis')->findOrFail($id);
        return view('categorias.show', ['categoria' => $categoria]);
        
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'descripcio' => 'nullable|string|max:255'
        ],
        [],//mensajes personalizados
        [ // cambiar el nombre del atributo en los mensajes de aviso por error
            'name' => 'Nom',
            'descripcio' => 'Descripcio'
        ]);

        Categoria::create([
            'nom' => $request->nom,
            'descripcio' => $request->descripcio
        ]);

        return redirect()->route('categorias.index');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('categorias.edit', ['categoria' => $categoria]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'descripcio' => 'nullable|string|max:255'
        ],
        [],//mensajes personalizados
        [ // cambiar el nombre del atributo en los mensajes de aviso por error
            'name' => 'Nom',
            'descripcio' => 'Descripcio'
        ]);

        $categoria = Categoria::findOrFail($id);

        $categoria->update([
            'nom' => $request->nom,
            'descripcio' => $request->descripcio
        ]);

        return redirect()->route('categorias.index');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index');
    }
}
