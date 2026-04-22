@extends('layouts.app')

@section('content')
<div class="card border border-secondary">
    <div class="card-header border-bottom border-secondary">
        <h5 class="mb-0"><i class="bi bi-person me-2"></i>Detalles del Estudiante</h5>
    </div>
    <div class="card-body">
        <div class="mb-4 pb-3 border-bottom">
            <label class="text-muted small text-uppercase fw-bold">Nombre Completo</label>
            <div class="fs-4 fw-bold">{{ $estudiante->nombre }}</div>
        </div>
        <div class="mb-4 pb-3 border-bottom">
            <label class="text-muted small text-uppercase fw-bold">Correo Electrónico</label>
            <div>{{ $estudiante->email }}</div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3 pb-3 border-bottom">
                <label class="text-muted small text-uppercase fw-bold">Edad</label>
                <div class="fs-5">{{ $estudiante->edad ?? 'No especificado' }}</div>
            </div>
            <div class="col-md-4 mb-3 pb-3 border-bottom">
                <label class="text-muted small text-uppercase fw-bold">Curso</label>
                <div>{{ $estudiante->curso ?? 'No especificado' }}</div>
            </div>
            <div class="col-md-4 mb-3 pb-3 border-bottom">
                <label class="text-muted small text-uppercase fw-bold">Promedio</label>
                <div>
                    @if($estudiante->promedio)
                        <span class="badge bg-success">{{ $estudiante->promedio }}</span>
                    @else
                        <span class="text-muted">No especificado</span>
                    @endif
                </div>
            </div>
            <div class="col-md-4 mb-3 pb-3 border-bottom">
                <label class="text-muted small text-uppercase fw-bold">Estado</label>
                <div>
                    @if($estudiante->activo)
                        <span class="badge bg-success">Sí</span>
                    @else
                        <span class="badge bg-secondary">No</span>
                    @endif
                </div>
            </div>
            <div class="col-md-4 mb-3 pb-3 border-bottom">
                <label class="text-muted small text-uppercase fw-bold">Fecha de Registro</label>
                <div>{{ $estudiante->fecha_registro?->format('d/m/Y') ?? 'No especificado' }}</div>
            </div>
            <div class="col-md-4 mb-3 pb-3 border-bottom">
                <label class="text-muted small text-uppercase fw-bold">Fecha de Creación</label>
                <div>{{ $estudiante->created_at->format('d/m/Y H:i') }}</div>
            </div>
            <div class="col-12 mb-0">
                <label class="text-muted small text-uppercase fw-bold">Última Actualización</label>
                <div>{{ $estudiante->updated_at->format('d/m/Y H:i') }}</div>
            </div>
        </div>
    </div>
    <div class="card-footer border-top bg-white">
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i>Volver al Listado
        </a>
    </div>
</div>
@endsection

