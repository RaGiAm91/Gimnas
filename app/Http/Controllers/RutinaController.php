<?php

namespace App\Http\Controllers;

use App\Models\Exercici;
use App\Models\Rutina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RutinaController extends Controller
{
    public function index()
    {

    $client = Auth::user()->client;

    if (!$client) {
        return redirect()->route('home');
    }

    $rutinas = Rutina::where('client_id', $client->id)->paginate(3);

    return view('rutinas.index', ['rutinas' => $rutinas]);
    }

    public function show($id)
    {
    $rutina = Rutina::with('exercicis')->findOrFail($id);
    if ($rutina->client_id !== Auth::user()->client->id) {
        return redirect()->route('rutinas.index');
    }
    $exercicis = Exercici::all();
    return view('rutinas.show', ['rutina' => $rutina, 'exercicis' => $exercicis]);
    }

    public function create()
    {
        return view('rutinas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'resum' => 'nullable|string|max:255',
            'duracio' => 'required|integer'
        ],
        [],//mensajes personalizados
        [ // cambiar el nombre del atributo en los mensajes de aviso por error
            'nom' => 'Nom',
            'resum' => 'Resum',
            'duracio' => 'Duracio'
        ]);

         $client = Auth::user()->client;

        if (!$client) {
            return redirect()->route('home');
        }

        $rutina = new Rutina;
        $rutina->nom = $request->nom;
        $rutina->resum = $request->resum;
        $rutina->duracio = $request->duracio;
        $rutina->client_id = Auth::user()->client->id;
        $rutina->save();

        return redirect()->route('rutinas.index');
    }

    public function edit($id)
    {
        $rutina = Rutina::findOrFail($id);

        if ($rutina->client_id !== Auth::user()->client->id) {
            return redirect()->route('rutinas.index');
        }

        return view('rutinas.edit', ['rutina' => $rutina]);
    }

    // AÑADIR EJERCICIO A RUTINA
    public function addExercise(Request $request, $rutinaId)
    {
        $request->validate([
            'exercici_id' => 'required|exists:exercicis,id',
            'series' => 'required|integer',
            'repeticions' => 'required|integer'
        ],
        [],//mensajes personalizados
        [ // cambiar el nombre del atributo en los mensajes de aviso por error
            'nom' => 'Nom',
            'resum' => 'Resum',
            'duracio' => 'Duracio'
        ]);

        $rutina = Rutina::findOrFail($rutinaId);

        if ($rutina->client_id !== Auth::user()->client->id) {
            return redirect()->route('rutinas.index');
        }

        $rutina->exercicis()->attach($request->exercici_id, [
            'series' => $request->series,
            'repeticions' => $request->repeticions
        ]);

        return redirect()->route('rutinas.index');
    }

    // ELIMINAR EJERCICIO DE RUTINA
    public function removeExercise($rutinaId, $exerciciId)
    {
        $rutina = Rutina::findOrFail($rutinaId);

        if ($rutina->client_id !== Auth::user()->client->id) {
            return redirect()->route('rutinas.index');
        }

        $rutina->exercicis()->detach($exerciciId);

        return redirect()->route('rutinas.index');
    }
}
