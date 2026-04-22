<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Http\Requests\EstudianteStoreRequest;
use App\Http\Requests\EstudianteUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EstudianteController extends Controller
{
    public function index(): View
    {
        $search  = request('search', '');
        $sortBy  = in_array(request('sort'), ['nombre','email','edad','curso','promedio','activo','id']) ? request('sort') : 'id';
        $sortDir = request('dir') === 'desc' ? 'desc' : 'asc';

        $query = Estudiante::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('email',  'like', "%{$search}%")
                  ->orWhere('curso',  'like', "%{$search}%");
            });
        }

        $estudiantes      = $query->orderBy($sortBy, $sortDir)->paginate(15)->withQueryString();
        $total            = Estudiante::count();
        $activos          = Estudiante::where('activo', true)->count();
        $inactivos        = Estudiante::where('activo', false)->count();
        $promedio_general = Estudiante::whereNotNull('promedio')->avg('promedio');

        return view('estudiantes.index', compact(
            'estudiantes', 'total', 'activos', 'inactivos',
            'promedio_general', 'search', 'sortBy', 'sortDir'
        ));
    }

    public function create(): View
    {
        return view('estudiantes.create');
    }

    public function store(EstudianteStoreRequest $request): RedirectResponse
    {
        Estudiante::create($request->validated());
        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante creado exitosamente.');
    }

    public function show(Estudiante $estudiante): View
    {
        return view('estudiantes.show', compact('estudiante'));
    }

    public function edit(Estudiante $estudiante): View
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    public function update(EstudianteUpdateRequest $request, Estudiante $estudiante): RedirectResponse
    {
        $estudiante->update($request->validated());
        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado exitosamente.');
    }

    public function destroy(Estudiante $estudiante): RedirectResponse
    {
        $estudiante->delete();
        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado exitosamente.');
    }
}
