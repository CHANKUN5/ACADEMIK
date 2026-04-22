@extends('layouts.app')

@section('content')
<div class="card border border-secondary">
    <div class="card-header border-bottom border-secondary">
        <h5 class="mb-0"><i class="bi bi-person-plus me-2"></i>Nuevo Estudiante</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('estudiantes.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Edad</label>
                    <input type="number" name="edad" class="form-control" min="0">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Curso</label>
                    <input type="text" name="curso" class="form-control" maxlength="50">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Promedio</label>
                    <input type="number" step="0.01" name="promedio" class="form-control" min="0" max="10">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Fecha de Registro</label>
                    <input type="date" name="fecha_registro" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Estado</label>
                    <div class="mt-2">
                        <input type="hidden" name="activo" value="0">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="activo" id="activoCreate" value="1" {{ old('activo', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="activoCreate">Activo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 pt-3 border-top">
                <div class="d-flex gap-2 justify-content-end">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-check-lg me-1"></i>Guardar
                    </button>
                    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

