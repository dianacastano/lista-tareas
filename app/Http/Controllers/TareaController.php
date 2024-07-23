<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TareaController extends Controller
{
    // Mostrar la lista de tareas
    public function index(Request $request)
    {
        $tareas = $request->session()->get('tareas', []);
        return view('tareas.index', compact('tareas'));
    }

    // Mostrar el formulario para crear una nueva tarea
    public function create()
    {
        return view('tareas.create');
    }

    // Guardar una nueva tarea
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
        ]);

        $tareas = $request->session()->get('tareas', []);
        $tareas[] = ['nombre' => $request->nombre, 'completada' => false];
        $request->session()->put('tareas', $tareas);

        return redirect()->route('tareas.index')->with('success', 'Tarea creada exitosamente.');
    }

    // Marcar una tarea como completada
    public function complete(Request $request, $index)
    {
        $tareas = $request->session()->get('tareas', []);
        if (isset($tareas[$index])) {
            $tareas[$index]['completada'] = true;
            $request->session()->put('tareas', $tareas);
        }

        return redirect()->route('tareas.index')->with('success', 'Tarea completada.');
    }

    // Eliminar una tarea
    public function destroy(Request $request, $index)
    {
        $tareas = $request->session()->get('tareas', []);
        if (isset($tareas[$index])) {
            unset($tareas[$index]);
            $request->session()->put('tareas', array_values($tareas));
        }

        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada.');
    }
}
