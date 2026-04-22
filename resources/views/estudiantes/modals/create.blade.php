<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#000000" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.971 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                    </svg>
                    <span class="fw-bold fs-5" id="createModalLabel" style="color:#000000;">Nuevo Estudiante</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar" style="filter:brightness(0);"></button>
            </div>
            <form action="{{ route('estudiantes.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre completo <span class="text-danger">*</span></label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ej: Juan Pérez García" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Correo electrónico <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" placeholder="correo@academix.edu" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Edad</label>
                            <input type="number" name="edad" class="form-control" placeholder="17" min="0" max="99">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Curso</label>
                            <input type="text" name="curso" class="form-control" placeholder="Ej: Matemáticas Avanzadas" maxlength="50">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Promedio</label>
                            <input type="number" step="0.01" name="promedio" class="form-control" placeholder="0.00 – 10.00" min="0" max="10">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Fecha de registro</label>
                            <input type="date" name="fecha_registro" class="form-control">
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between p-3 rounded" style="background:#21262d;border:1px solid #30363d;">
                                <div>
                                    <div class="fw-bold text-white">Estado del estudiante</div>
                                    <div class="small text-muted">Activar registro en el sistema académico</div>
                                </div>
                                <div class="form-check form-switch mb-0">
                                    <input type="hidden" name="activo" value="0">
                                    <input class="form-check-input" type="checkbox" name="activo" id="activoCreate" value="1" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16" style="margin-right:5px;margin-top:-2px;">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
