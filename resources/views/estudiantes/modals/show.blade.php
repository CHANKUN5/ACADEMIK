<div class="modal fade" id="showModal{{ $estudiante->id }}" tabindex="-1" aria-labelledby="showModalLabel{{ $estudiante->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#000000" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                    <span class="fw-bold fs-5" id="showModalLabel{{ $estudiante->id }}" style="color:#000000;">Perfil del Estudiante</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar" style="filter:brightness(0);"></button>
            </div>
            <div class="modal-body p-0">
                <div class="d-flex align-items-center gap-3 p-4" style="background:#21262d;border-bottom:1px solid #30363d;">
                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width:64px;height:64px;background:#2ecc71;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="#000000" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.029 10 8 10c-2.029 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                    </div>
                    <div class="flex-grow-1 min-width-0">
                        <div class="fw-bold fs-5 text-white">{{ $estudiante->nombre }}</div>
                        <div class="text-muted small">{{ $estudiante->email }}</div>
                    </div>
                    <div class="flex-shrink-0">
                        @if($estudiante->activo)
                            <span class="badge bg-success px-3 py-2">Activo</span>
                        @else
                            <span class="badge bg-secondary px-3 py-2">Inactivo</span>
                        @endif
                    </div>
                </div>

                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-6 col-md-4">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                    </svg>
                                    Edad
                                </div>
                                <div class="detail-value">{{ $estudiante->edad ?? '—' }} años</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                    </svg>
                                    Curso
                                </div>
                                <div class="detail-value">{{ $estudiante->curso ?? '—' }}</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                                    </svg>
                                    Promedio
                                </div>
                                <div class="detail-value">
                                    @if($estudiante->promedio !== null)
                                        <span style="color:{{ $estudiante->promedio >= 7 ? '#2ecc71' : '#e74c3c' }};font-weight:700;">
                                            {{ number_format($estudiante->promedio, 2) }}
                                        </span>
                                    @else
                                        —
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    </svg>
                                    Fecha Registro
                                </div>
                                <div class="detail-value">{{ $estudiante->fecha_registro?->format('d/m/Y') ?? '—' }}</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                    </svg>
                                    Creado
                                </div>
                                <div class="detail-value">{{ $estudiante->created_at->format('d/m/Y H:i') }}</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                    Actualizado
                                </div>
                                <div class="detail-value">{{ $estudiante->updated_at->format('d/m/Y H:i') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
