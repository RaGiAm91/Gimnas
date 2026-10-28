<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Exercici;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExerciciController extends Controller
{
    public function index()
    {
        $exercicis = Exercici::with('categoria')->paginate(6);
        return view('exercicis.index', ['exercicis' => $exercicis]);
        
    }

    public function show($id)
    {
        $exercici = Exercici::with('categoria')->findOrFail($id);
        return view('exercicis.show', ['exercici' => $exercici]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('exercicis.create', ['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'descripcio' => 'nullable|string|max:255',
            'imatge' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'categoria_id' => 'required|exists:categorias,id'
        ],
        [],//mensajes personalizados
        [ // cambiar el nombre del atributo en los mensajes de aviso por error
            'nom' => 'Nom',
            'descripcio' => 'Descripcio',
            'imatge' => 'Imatge'
        ]);

    $imatge = null;
    if ($request->hasFile('imatge')) {
        $imatge = Storage::disk('public')->put('exercicis', $request->file('imatge'));
    }

        Exercici::create([
            'nom' => $request->nom,
            'descripcio' => $request->descripcio,
            'imatge' => $imatge,
            'categoria_id' => $request->categoria_id
        ]);

        return redirect()->route('exercicis.index');
    }

    public function edit($id)
    {
        $exercici = Exercici::findOrFail($id);
        $categorias = Categoria::all();

        return view('exercicis.edit', [
            'exercici' => $exercici,
            'categorias' => $categorias
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'descripcio' => 'nullable|string|max:255',
            'imatge' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'categoria_id' => 'required|exists:categorias,id'
        ],
        [],//mensajes personalizados
        [ // cambiar el nombre del atributo en los mensajes de aviso por error
            'nom' => 'Nom',
            'descripcio' => 'Descripcio',
            'imatge' => 'Imatge'
        ]);

        $exercici = Exercici::findOrFail($id);

        if ($request->hasFile('imatge')) {
        // Borramos la imagen antigua si existe
        if ($exercici->imatge) {
            Storage::disk('public')->delete($exercici->imatge);
        }
        $exercici->imatge = Storage::disk('public')->put('exercicis', $request->file('imatge'));
    }

    $exercici->update([
        'nom'          => $request->nom,
        'descripcio'   => $request->descripcio,
        'imatge'       => $exercici->imatge,
        'categoria_id' => $request->categoria_id
    ]);

        return redirect()->route('exercicis.index');
    }

    public function destroy($id)
    {
        $exercici = Exercici::findOrFail($id);
        $exercici->delete();

        return redirect()->route('exercicis.index');
    }
}
