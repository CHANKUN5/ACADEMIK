<div class="modal fade" id="editModal{{ $estudiante->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $estudiante->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                    <span class="fw-bold fs-5" id="editModalLabel{{ $estudiante->id }}" style="color:#000000;">Editar Estudiante</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar" style="filter:brightness(0);"></button>
            </div>
            <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre completo <span class="text-danger">*</span></label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $estudiante->nombre) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Correo electrónico <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $estudiante->email) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Edad</label>
                            <input type="number" name="edad" class="form-control" value="{{ old('edad', $estudiante->edad) }}" min="0" max="99">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Curso</label>
                            <input type="text" name="curso" class="form-control" value="{{ old('curso', $estudiante->curso) }}" maxlength="50">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Promedio</label>
                            <input type="number" step="0.01" name="promedio" class="form-control" value="{{ old('promedio', $estudiante->promedio) }}" min="0" max="10">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Fecha de registro</label>
                            <input type="date" name="fecha_registro" class="form-control" value="{{ old('fecha_registro', $estudiante->fecha_registro?->format('Y-m-d')) }}">
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between p-3 rounded" style="background:#21262d;border:1px solid #30363d;">
                                <div>
                                    <div class="fw-bold text-white">Estado del estudiante</div>
                                    <div class="small text-muted">Activar registro en el sistema académico</div>
                                </div>
                                <div class="form-check form-switch mb-0">
                                    <input type="hidden" name="activo" value="0">
                                    <input class="form-check-input" type="checkbox" name="activo" id="activoEdit{{ $estudiante->id }}" value="1" {{ old('activo', $estudiante->activo) ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16" style="margin-right:5px;margin-top:-2px;">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
