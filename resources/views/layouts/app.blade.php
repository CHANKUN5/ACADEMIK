<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ACADEMIX')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Be Vietnam Pro', sans-serif;
            background: #0d1117;
            min-height: 100vh;
            color: #e6edf3;
            margin: 0;
        }

        .navbar {
            background: #161b22;
            border-bottom: 2px solid #2ecc71;
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.6rem;
            letter-spacing: 2px;
            color: #ffffff !important;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card {
            border: 1px solid #30363d;
            border-radius: 10px;
            background: #161b22;
            overflow: hidden;
        }

        .card-header {
            background: #161b22;
            border-bottom: 2px solid #2ecc71;
            padding: 1.25rem 1.5rem;
        }

        .card-header h5 {
            font-weight: 700;
            color: #ffffff;
            font-size: 1.4rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header small {
            color: #8b949e;
            font-weight: 500;
            font-size: 0.85rem;
        }

        .stat-card {
            background: #21262d;
            border: 1px solid #30363d;
            border-radius: 10px;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #8b949e;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 2px;
        }

        .search-box {
            background: #21262d;
            border: 1px solid #30363d;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            color: #e6edf3;
            font-family: 'Be Vietnam Pro', sans-serif;
            font-weight: 500;
            width: 100%;
            transition: border-color 0.2s;
        }

        .search-box:focus {
            outline: none;
            border-color: #2ecc71;
            background: #21262d;
            color: #e6edf3;
        }

        .search-box::placeholder {
            color: #484f58;
        }

        .search-wrapper {
            position: relative;
        }

        .search-wrapper svg {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #484f58;
            pointer-events: none;
        }

        .search-wrapper .search-box {
            padding-left: 2.5rem;
            padding-right: 2.5rem;
        }

        .search-clear {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #484f58;
            cursor: pointer;
            display: flex;
            align-items: center;
            background: none;
            border: none;
            padding: 0;
        }

        .search-clear:hover { color: #e74c3c; }

        .sort-link {
            color: inherit;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
        }

        .sort-link:hover { color: #2ecc71; }

        .table-scroll {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-scroll::-webkit-scrollbar {
            height: 6px;
        }

        .table-scroll::-webkit-scrollbar-track {
            background: #21262d;
        }

        .table-scroll::-webkit-scrollbar-thumb {
            background: #2ecc71;
            border-radius: 3px;
        }

        .table-scroll::-webkit-scrollbar-thumb:hover {
            background: #27ae60;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            min-width: 700px;
            margin: 0;
        }

        .table thead th {
            background: #21262d;
            border-top: none;
            border-bottom: 2px solid #2ecc71;
            border-right: 1px solid #30363d;
            color: #2ecc71;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.78rem;
            letter-spacing: 0.8px;
            padding: 0.9rem 1rem;
            white-space: nowrap;
        }

        .table thead th:last-child {
            border-right: none;
        }

        .table tbody td {
            border-bottom: 1px solid #21262d;
            border-right: 1px solid #21262d;
            padding: 0.85rem 1rem;
            vertical-align: middle;
            color: #e6edf3;
            font-weight: 500;
            background: #161b22;
        }

        .table tbody td:last-child {
            border-right: none;
        }

        .table tbody tr:hover td {
            background: #1c2128;
        }

        .btn-primary {
            background: #2ecc71;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            padding: 0.6rem 1.25rem;
            color: #000000;
            font-family: 'Be Vietnam Pro', sans-serif;
            transition: background 0.2s, transform 0.1s;
            white-space: nowrap;
        }

        .btn-primary:hover {
            background: #27ae60;
            color: #000000;
            transform: translateY(-1px);
        }

        .btn-sm {
            border-radius: 6px;
            padding: 0.4rem 0.75rem;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.1s;
            padding: 0;
        }

        .btn-action:hover {
            opacity: 0.85;
            transform: translateY(-1px);
        }

        .btn-view  { background: #1d4ed8; color: #ffffff; }
        .btn-edit  { background: #2ecc71; color: #000000; }
        .btn-del   { background: #e74c3c; color: #ffffff; }

        .btn-light {
            background: #21262d;
            border: 1px solid #30363d;
            color: #e6edf3;
            font-weight: 600;
            font-family: 'Be Vietnam Pro', sans-serif;
        }

        .btn-light:hover {
            background: #30363d;
            color: #ffffff;
        }

        .form-control, .form-select {
            border: 1px solid #30363d;
            border-radius: 8px;
            padding: 0.65rem 0.9rem;
            font-weight: 500;
            background: #21262d;
            color: #e6edf3;
            font-family: 'Be Vietnam Pro', sans-serif;
        }

        .form-control:focus, .form-select:focus {
            border-color: #2ecc71;
            box-shadow: 0 0 0 3px rgba(46, 204, 113, 0.15);
            background: #21262d;
            color: #e6edf3;
        }

        .form-control::placeholder { color: #484f58; }

        .modal-content {
            border: 1px solid #30363d;
            border-radius: 12px;
            background: #161b22;
        }

        .modal-header {
            background: #2ecc71;
            color: #000000;
            border-bottom: none;
            padding: 1.1rem 1.5rem;
            border-radius: 11px 11px 0 0;
        }

        .modal-header .fw-bold { color: #000000; }

        .modal-header .btn-close {
            filter: brightness(0);
            opacity: 0.7;
        }

        .modal-body {
            background: #161b22;
            padding: 1.5rem;
        }

        .modal-footer {
            background: #21262d;
            border-top: 1px solid #30363d;
            padding: 1rem 1.5rem;
            border-radius: 0 0 11px 11px;
        }

        .detail-item {
            padding: 0.85rem 1rem;
            background: #21262d;
            border-radius: 8px;
            border: 1px solid #30363d;
        }

        .detail-label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #2ecc71;
            letter-spacing: 0.8px;
            margin-bottom: 0.3rem;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .detail-value {
            font-size: 0.95rem;
            color: #e6edf3;
            font-weight: 600;
        }

        .badge {
            border-radius: 6px;
            font-weight: 700;
            padding: 0.35rem 0.75rem;
            font-size: 0.78rem;
        }

        .badge.bg-success {
            background: #2ecc71 !important;
            color: #000000;
        }

        .badge.bg-secondary {
            background: #484f58 !important;
            color: #e6edf3;
        }

        .pagination {
            gap: 4px;
            margin: 0;
        }

        .pagination .page-link {
            border: 1px solid #30363d;
            border-radius: 6px;
            color: #2ecc71;
            background: #21262d;
            font-weight: 600;
            padding: 0.45rem 0.8rem;
            font-family: 'Be Vietnam Pro', sans-serif;
        }

        .pagination .page-item.active .page-link {
            background: #2ecc71;
            border-color: #2ecc71;
            color: #000000;
        }

        .pagination .page-link:hover {
            background: #30363d;
            border-color: #2ecc71;
            color: #2ecc71;
        }

        .pagination .page-item.disabled .page-link {
            background: #161b22;
            border-color: #30363d;
            color: #484f58;
        }

        .pagination-info {
            color: #8b949e;
            font-weight: 500;
            font-size: 0.85rem;
        }

        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .toast {
            border-radius: 8px;
            border: 1px solid #27ae60;
            background: #2ecc71 !important;
        }

        .form-label {
            font-weight: 600;
            color: #2ecc71;
            margin-bottom: 0.4rem;
            font-size: 0.85rem;
        }

        .text-danger { color: #e74c3c !important; }
        .text-muted  { color: #8b949e !important; }
        .text-white  { color: #ffffff !important; }

        .form-switch .form-check-input {
            width: 2.8em;
            height: 1.4em;
            background-color: #30363d;
            border-color: #30363d;
        }

        .form-switch .form-check-input:checked {
            background-color: #2ecc71;
            border-color: #2ecc71;
        }

        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
            border: 2px dashed #30363d;
            border-radius: 10px;
            margin: 2rem;
            background: #21262d;
        }

        .empty-state h5 { color: #ffffff; font-weight: 700; }
        .empty-state p  { color: #8b949e; }

        @media (max-width: 768px) {
            .navbar-brand { font-size: 1.3rem; }
            .stat-card { padding: 1rem; }
            .stat-value { font-size: 1.4rem; }
            .card-header { padding: 1rem; }
            .card-header h5 { font-size: 1.2rem; }
            .table thead th, .table tbody td { padding: 0.65rem 0.6rem; font-size: 0.82rem; }
            .btn-action { width: 30px; height: 30px; }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-3 px-md-4" style="max-width:1600px;margin:0 auto;">
            <a class="navbar-brand" href="{{ route('estudiantes.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#2ecc71" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                </svg>
                ACADEMIX
            </a>
        </div>
    </nav>

    <main class="py-4 px-3 px-md-4" style="max-width:1600px;margin:0 auto;">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="toast-container">
        @if(session('success'))
            <div class="toast show align-items-center text-dark border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="margin-right:6px;">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        @endif
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.toast.show').forEach(function (el) {
                setTimeout(function () { bootstrap.Toast.getOrCreateInstance(el).hide(); }, 4000);
            });
        });
    </script>
</body>
</html>
