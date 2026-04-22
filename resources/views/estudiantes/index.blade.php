@extends('layouts.app')

@section('content')

@php
    function sortUrl($col, $currentSort, $currentDir) {
        $dir = ($currentSort === $col && $currentDir === 'asc') ? 'desc' : 'asc';
        return request()->fullUrlWithQuery(['sort' => $col, 'dir' => $dir, 'page' => 1]);
    }
    function sortIcon($col, $currentSort, $currentDir) {
        if ($currentSort !== $col) {
            return '<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="#484f58" viewBox="0 0 16 16" style="margin-left:4px;"><path d="M7.247 4.86l-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/></svg>';
        }
        if ($currentDir === 'asc') {
            return '<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="#2ecc71" viewBox="0 0 16 16" style="margin-left:4px;"><path d="M7.247 4.86l-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/></svg>';
        }
        return '<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="#2ecc71" viewBox="0 0 16 16" style="margin-left:4px;"><path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/></svg>';
    }
@endphp

<div class="row g-3 mb-4">
    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#1d4ed8;">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#fff" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                </svg>
            </div>
            <div>
                <div class="stat-value">{{ $total }}</div>
                <div class="stat-label">Total Estudiantes</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#2ecc71;">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#000" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
            </div>
            <div>
                <div class="stat-value">{{ $activos }}</div>
                <div class="stat-label">Activos</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#484f58;">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#fff" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
            </div>
            <div>
                <div class="stat-value">{{ $inactivos }}</div>
                <div class="stat-label">Inactivos</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#f39c12;">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#000" viewBox="0 0 16 16">
                    <path d="M2.5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11zm2 3a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm2 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3z"/>
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2z"/>
                </svg>
            </div>
            <div>
                <div class="stat-value">{{ $promedio_general ? number_format($promedio_general, 2) : '—' }}</div>
                <div class="stat-label">Promedio General</div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
                <h5>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg>
                    Estudiantes
                </h5>
                <small>Gestión completa del registro académico</small>
            </div>
            <button type="button" class="btn btn-primary flex-shrink-0" data-bs-toggle="modal" data-bs-target="#createModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16" style="margin-right:5px;margin-top:-2px;">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Nuevo Estudiante
            </button>
        </div>
        <form method="GET" action="{{ route('estudiantes.index') }}" id="searchForm">
            <input type="hidden" name="sort" value="{{ $sortBy }}">
            <input type="hidden" name="dir"  value="{{ $sortDir }}">
            <div class="search-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.099zm-5.242 1.656a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z"/>
                </svg>
                <input type="text" name="search" id="searchInput" class="search-box" placeholder="Buscar por nombre, email o curso..." value="{{ $search }}" autocomplete="off">
                <span class="search-clear" id="searchClear" style="{{ $search ? '' : 'display:none;' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </span>
            </div>
        </form>
    </div>

    <div class="card-body p-0">
        @if($estudiantes->count() > 0)
            <div class="table-scroll">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:52px;">#</th>
                            <th>
                                <a href="{{ sortUrl('nombre', $sortBy, $sortDir) }}" class="sort-link">
                                    Nombre {!! sortIcon('nombre', $sortBy, $sortDir) !!}
                                </a>
                            </th>
                            <th>
                                <a href="{{ sortUrl('email', $sortBy, $sortDir) }}" class="sort-link">
                                    Email {!! sortIcon('email', $sortBy, $sortDir) !!}
                                </a>
                            </th>
                            <th class="text-center" style="width:75px;">
                                <a href="{{ sortUrl('edad', $sortBy, $sortDir) }}" class="sort-link">
                                    Edad {!! sortIcon('edad', $sortBy, $sortDir) !!}
                                </a>
                            </th>
                            <th>
                                <a href="{{ sortUrl('curso', $sortBy, $sortDir) }}" class="sort-link">
                                    Curso {!! sortIcon('curso', $sortBy, $sortDir) !!}
                                </a>
                            </th>
                            <th class="text-center" style="width:105px;">
                                <a href="{{ sortUrl('promedio', $sortBy, $sortDir) }}" class="sort-link">
                                    Promedio {!! sortIcon('promedio', $sortBy, $sortDir) !!}
                                </a>
                            </th>
                            <th class="text-center" style="width:100px;">
                                <a href="{{ sortUrl('activo', $sortBy, $sortDir) }}" class="sort-link">
                                    Estado {!! sortIcon('activo', $sortBy, $sortDir) !!}
                                </a>
                            </th>
                            <th class="text-center" style="width:125px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($estudiantes as $estudiante)
                        <tr>
                            <td class="text-center" style="color:#484f58;font-weight:700;">{{ $loop->iteration + ($estudiantes->currentPage() - 1) * $estudiantes->perPage() }}</td>
                            <td style="color:#e6edf3;font-weight:600;white-space:nowrap;">
                                <div class="d-flex align-items-center gap-2">
                                    <div style="width:34px;height:34px;border-radius:50%;background:#2ecc71;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-weight:800;font-size:0.85rem;color:#000000;">
                                        {{ strtoupper(mb_substr($estudiante->nombre, 0, 1)) }}
                                    </div>
                                    <span>{{ $estudiante->nombre }}</span>
                                </div>
                            </td>
                            <td style="color:#8b949e;white-space:nowrap;">{{ $estudiante->email }}</td>
                            <td class="text-center" style="color:#e6edf3;">{{ $estudiante->edad ?? '—' }}</td>
                            <td style="color:#e6edf3;white-space:nowrap;">{{ $estudiante->curso ?? '—' }}</td>
                            <td class="text-center">
                                @if($estudiante->promedio !== null)
                                    <span class="badge bg-success">{{ number_format($estudiante->promedio, 2) }}</span>
                                @else
                                    <span style="color:#484f58;">—</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($estudiante->activo)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <button type="button" class="btn-action btn-view" data-bs-toggle="modal" data-bs-target="#showModal{{ $estudiante->id }}" title="Ver">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn-action btn-edit" data-bs-toggle="modal" data-bs-target="#editModal{{ $estudiante->id }}" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn-action btn-del" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $estudiante->id }}" title="Eliminar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2 p-3" style="background:#21262d;border-top:1px solid #30363d;">
                <div class="pagination-info">
                    Mostrando {{ $estudiantes->firstItem() }}–{{ $estudiantes->lastItem() }} de {{ $estudiantes->total() }} registros
                    @if($search) &nbsp;·&nbsp; búsqueda: <strong style="color:#2ecc71;">{{ $search }}</strong> @endif
                </div>
                {{ $estudiantes->links() }}
            </div>
        @else
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#484f58" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                </svg>
                <h5 class="mt-3">Sin resultados</h5>
                <p>{{ $search ? 'No se encontraron coincidencias para "' . $search . '"' : 'Agrega tu primer estudiante' }}</p>
            </div>
        @endif
    </div>
</div>

@include('estudiantes.modals.create')
@foreach($estudiantes as $estudiante)
    @include('estudiantes.modals.show',   ['estudiante' => $estudiante])
    @include('estudiantes.modals.edit',   ['estudiante' => $estudiante])
    @include('estudiantes.modals.delete', ['estudiante' => $estudiante])
@endforeach

<script>
    (function () {
        var input   = document.getElementById('searchInput');
        var clear   = document.getElementById('searchClear');
        var form    = document.getElementById('searchForm');
        var timer   = null;

        input.addEventListener('input', function () {
            clear.style.display = this.value.length ? '' : 'none';
            clearTimeout(timer);
            timer = setTimeout(function () { form.submit(); }, 400);
        });

        clear.addEventListener('click', function () {
            input.value = '';
            clear.style.display = 'none';
            form.submit();
        });
    })();
</script>
@endsection
