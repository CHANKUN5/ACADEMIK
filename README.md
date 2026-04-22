# ACADEMIX — Sistema de Gestión de Estudiantes

> Aplicación web construida con **Laravel 11** y **Bootstrap 5** para administrar el registro académico de estudiantes. Incluye listado con estadísticas, búsqueda en tiempo real, ordenamiento por columnas, paginación y operaciones CRUD completas mediante modales.

---

## Tabla de Contenidos

1. [Estructura del Proyecto](#estructura-del-proyecto)
2. [Pantallas y su Propósito](#pantallas-y-su-propósito)
3. [Archivos Clave y su Código Prioritario](#archivos-clave-y-su-código-prioritario)
4. [Conexión Frontend ↔ Backend](#conexión-frontend--backend)
5. [Rutas Disponibles](#rutas-disponibles)
6. [Base de Datos](#base-de-datos)
7. [Validaciones](#validaciones)
8. [Instalación y Configuración](#instalación-y-configuración)

---

## Estructura del Proyecto

```
app/
├── Http/
│   ├── Controllers/
│   │   └── EstudianteController.php   ← Lógica de negocio (CRUD + estadísticas)
│   └── Requests/
│       ├── EstudianteStoreRequest.php  ← Validación al crear
│       └── EstudianteUpdateRequest.php ← Validación al editar
├── Models/
│   └── Estudiante.php                 ← Modelo Eloquent

database/
├── migrations/
│   └── 2026_04_22_003529_create_estudiantes_table.php
└── seeders/
    └── EstudianteSeeder.php           ← 10 estudiantes de prueba

resources/views/
├── layouts/
│   └── app.blade.php                  ← Layout base (navbar, estilos, toasts)
└── estudiantes/
    ├── index.blade.php                ← Pantalla principal (tabla + estadísticas)
    ├── create.blade.php               ← Formulario de creación (página dedicada)
    ├── edit.blade.php                 ← Formulario de edición (página dedicada)
    ├── show.blade.php                 ← Detalle del estudiante (página dedicada)
    └── modals/
        ├── create.blade.php           ← Modal de creación (usado desde index)
        ├── edit.blade.php             ← Modal de edición (usado desde index)
        ├── show.blade.php             ← Modal de detalle (usado desde index)
        └── delete.blade.php           ← Modal de confirmación de eliminación

routes/
└── web.php                            ← Definición de rutas (resource route)
```

---

## Pantallas y su Propósito

### 1. `index` — Pantalla Principal

**Archivo:** `resources/views/estudiantes/index.blade.php`  
**URL:** `GET /estudiantes`

Es la pantalla central de la aplicación. Contiene todo lo que el usuario necesita para gestionar estudiantes sin salir de la página.

**Secciones:**

| Sección | Descripción |
|---|---|
| **Tarjetas de estadísticas** | Muestra en tiempo real: Total de estudiantes, Activos, Inactivos y Promedio General |
| **Barra de búsqueda** | Filtra por nombre, email o curso con debounce de 400ms (sin recargar manualmente) |
| **Tabla de estudiantes** | Lista paginada (15 por página) con columnas ordenables: Nombre, Email, Edad, Curso, Promedio, Estado |
| **Botones de acción** | Cada fila tiene 3 botones: Ver (azul), Editar (verde), Eliminar (rojo) — abren modales |
| **Paginación** | Muestra "X–Y de Z registros" con navegación Bootstrap |
| **Modales incluidos** | Al final del archivo se incluyen los 4 modales para operar sin cambiar de página |

**Código prioritario en este archivo:**

```php
{{-- Función PHP inline para construir URLs de ordenamiento --}}
@php
function sortUrl($col, $currentSort, $currentDir) {
    $dir = ($currentSort === $col && $currentDir === 'asc') ? 'desc' : 'asc';
    return request()->fullUrlWithQuery(['sort' => $col, 'dir' => $dir, 'page' => 1]);
}
@endphp

{{-- Inclusión de modales al final de la vista --}}
@include('estudiantes.modals.create')
@foreach($estudiantes as $estudiante)
    @include('estudiantes.modals.show',   ['estudiante' => $estudiante])
    @include('estudiantes.modals.edit',   ['estudiante' => $estudiante])
    @include('estudiantes.modals.delete', ['estudiante' => $estudiante])
@endforeach
```

```javascript
// Búsqueda automática con debounce (sin botón de submit)
input.addEventListener('input', function () {
    clearTimeout(timer);
    timer = setTimeout(function () { form.submit(); }, 400);
});
```

---

### 2. `modals/create` — Modal Crear Estudiante

**Archivo:** `resources/views/estudiantes/modals/create.blade.php`  
**Se abre desde:** botón "Nuevo Estudiante" en `index`

Modal con formulario completo para registrar un nuevo estudiante. Se envía por `POST` al backend sin salir de la pantalla principal.

**Campos del formulario:**

| Campo | Tipo | Requerido |
|---|---|---|
| Nombre completo | `text` | ✅ |
| Correo electrónico | `email` | ✅ |
| Edad | `number` (0–99) | ❌ |
| Curso | `text` (max 50) | ❌ |
| Promedio | `number` (0.00–10.00) | ❌ |
| Fecha de registro | `date` | ❌ |
| Estado (Activo) | `checkbox` toggle | ❌ (default: activo) |

**Código prioritario:**

```html
<form action="{{ route('estudiantes.store') }}" method="POST">
    @csrf
    {{-- El hidden garantiza que si el checkbox no está marcado, se envíe "0" --}}
    <input type="hidden" name="activo" value="0">
    <input class="form-check-input" type="checkbox" name="activo" value="1" checked>
</form>
```

---

### 3. `modals/edit` — Modal Editar Estudiante

**Archivo:** `resources/views/estudiantes/modals/edit.blade.php`  
**Se abre desde:** botón editar (verde) en cada fila de la tabla

Idéntico al modal de creación pero pre-rellena los campos con los datos actuales del estudiante. Usa `PUT` mediante el helper `@method('PUT')` de Laravel.

**Código prioritario:**

```html
<form action="{{ route('estudiantes.update', $estudiante) }}" method="POST">
    @csrf
    @method('PUT')   {{-- Los navegadores no soportan PUT nativo; Laravel lo intercepta --}}
    <input type="text" name="nombre" value="{{ old('nombre', $estudiante->nombre) }}">
</form>
```

> `old('nombre', $estudiante->nombre)` — si la validación falla y se recarga la página, conserva el valor que el usuario escribió; si no, muestra el valor actual del modelo.

---

### 4. `modals/show` — Modal Ver Detalle

**Archivo:** `resources/views/estudiantes/modals/show.blade.php`  
**Se abre desde:** botón ver (azul) en cada fila de la tabla

Modal de solo lectura que muestra el perfil completo del estudiante: avatar con inicial, nombre, email, estado, edad, curso, promedio (con color verde/rojo según sea ≥7 o <7), fecha de registro, fecha de creación y última actualización.

**Código prioritario:**

```php
{{-- Promedio con color condicional --}}
<span style="color:{{ $estudiante->promedio >= 7 ? '#2ecc71' : '#e74c3c' }};">
    {{ number_format($estudiante->promedio, 2) }}
</span>
```

---

### 5. `modals/delete` — Modal Confirmar Eliminación

**Archivo:** `resources/views/estudiantes/modals/delete.blade.php`  
**Se abre desde:** botón eliminar (rojo) en cada fila de la tabla

Modal de confirmación con diseño de alerta roja. Muestra el nombre del estudiante a eliminar y advierte que la acción es irreversible. Envía `DELETE` al backend.

**Código prioritario:**

```html
<form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar</button>
</form>
```

---

### 6. `create.blade.php` y `edit.blade.php` — Páginas Dedicadas

**Archivos:** `resources/views/estudiantes/create.blade.php` / `edit.blade.php`

Versiones en página completa de los formularios de creación y edición. Existen como alternativa a los modales (por ejemplo, para acceso directo por URL). Funcionalmente son equivalentes a los modales pero como vistas independientes que extienden el layout.

---

### 7. `show.blade.php` — Página Dedicada de Detalle

**Archivo:** `resources/views/estudiantes/show.blade.php`  
**URL:** `GET /estudiantes/{id}`

Vista de solo lectura en página completa con todos los campos del estudiante. Incluye botón "Volver al Listado".

---

### 8. `layouts/app.blade.php` — Layout Base

**Archivo:** `resources/views/layouts/app.blade.php`

Define la estructura HTML compartida por todas las vistas. Contiene:

- **Navbar** con logo ACADEMIX y enlace al índice
- **Estilos CSS globales** (tema oscuro: fondo `#0d1117`, acento `#2ecc71`)
- **Bootstrap 5.3** cargado desde CDN
- **Fuente** Be Vietnam Pro (Google Fonts)
- **Sistema de toasts** — muestra mensajes de éxito (`session('success')`) con auto-cierre a los 4 segundos

**Código prioritario:**

```html
{{-- Toast de éxito (aparece tras crear/editar/eliminar) --}}
@if(session('success'))
    <div class="toast show">{{ session('success') }}</div>
@endif

<script>
    // Auto-cierre del toast a los 4 segundos
    document.querySelectorAll('.toast.show').forEach(function (el) {
        setTimeout(function () { bootstrap.Toast.getOrCreateInstance(el).hide(); }, 4000);
    });
</script>
```

---

## Archivos Clave y su Código Prioritario

### `EstudianteController.php`

Controlador principal. Maneja las 7 acciones del resource route.

**Método `index` — el más complejo:**

```php
public function index(): View
{
    $search  = request('search', '');
    $sortBy  = in_array(request('sort'), ['nombre','email','edad','curso','promedio','activo','id'])
               ? request('sort') : 'id';                    // whitelist de columnas ordenables
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
```

> `withQueryString()` preserva los parámetros de búsqueda y ordenamiento en los links de paginación.

**Métodos CRUD:**

```php
public function store(EstudianteStoreRequest $request): RedirectResponse
{
    Estudiante::create($request->validated()); // solo campos validados
    return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado exitosamente.');
}

public function update(EstudianteUpdateRequest $request, Estudiante $estudiante): RedirectResponse
{
    $estudiante->update($request->validated());
    return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado exitosamente.');
}

public function destroy(Estudiante $estudiante): RedirectResponse
{
    $estudiante->delete();
    return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado exitosamente.');
}
```

---

### `Estudiante.php` — Modelo

```php
protected $fillable = [
    'nombre', 'email', 'edad', 'curso',
    'promedio', 'fecha_registro', 'activo',
];

protected $casts = [
    'fecha_registro' => 'date',     // Carbon date
    'activo'         => 'boolean',  // 0/1 → true/false
    'promedio'       => 'decimal:2',
];
```

---

## Conexión Frontend ↔ Backend

### Flujo completo de cada operación

```
CREAR
  Frontend: Modal create → <form POST /estudiantes> + @csrf
  Backend:  Route::resource → EstudianteController@store
            → EstudianteStoreRequest (valida) → Estudiante::create()
            → redirect con session('success') → Toast en layout

EDITAR
  Frontend: Modal edit → <form POST /estudiantes/{id}> + @method('PUT')
  Backend:  Route::resource → EstudianteController@update
            → EstudianteUpdateRequest (valida, ignora email propio)
            → $estudiante->update() → redirect con session('success')

ELIMINAR
  Frontend: Modal delete → <form POST /estudiantes/{id}> + @method('DELETE')
  Backend:  Route::resource → EstudianteController@destroy
            → $estudiante->delete() → redirect con session('success')

VER DETALLE
  Frontend: Modal show → solo lectura, no envía datos
  (también disponible como página: GET /estudiantes/{id})

BUSCAR
  Frontend: Input con debounce 400ms → submit GET /estudiantes?search=...
  Backend:  EstudianteController@index → query LIKE en nombre/email/curso

ORDENAR
  Frontend: Links en cabeceras de tabla → GET /estudiantes?sort=nombre&dir=asc
  Backend:  EstudianteController@index → orderBy($sortBy, $sortDir)
            (whitelist de columnas para prevenir SQL injection)
```

### Variables que el backend envía al frontend

El método `index` pasa estas variables a la vista:

| Variable | Tipo | Uso en la vista |
|---|---|---|
| `$estudiantes` | `LengthAwarePaginator` | Tabla + paginación |
| `$total` | `int` | Tarjeta "Total Estudiantes" |
| `$activos` | `int` | Tarjeta "Activos" |
| `$inactivos` | `int` | Tarjeta "Inactivos" |
| `$promedio_general` | `float\|null` | Tarjeta "Promedio General" |
| `$search` | `string` | Valor actual del input de búsqueda |
| `$sortBy` | `string` | Columna activa de ordenamiento |
| `$sortDir` | `string` | Dirección activa (`asc`/`desc`) |

---

## Rutas Disponibles

`Route::resource('estudiantes', EstudianteController::class)` genera automáticamente:

| Método HTTP | URL | Acción del Controlador | Nombre de Ruta |
|---|---|---|---|
| GET | `/estudiantes` | `index` | `estudiantes.index` |
| GET | `/estudiantes/create` | `create` | `estudiantes.create` |
| POST | `/estudiantes` | `store` | `estudiantes.store` |
| GET | `/estudiantes/{id}` | `show` | `estudiantes.show` |
| GET | `/estudiantes/{id}/edit` | `edit` | `estudiantes.edit` |
| PUT/PATCH | `/estudiantes/{id}` | `update` | `estudiantes.update` |
| DELETE | `/estudiantes/{id}` | `destroy` | `estudiantes.destroy` |

La ruta raíz `/` redirige automáticamente a `estudiantes.index`.

---

## Base de Datos

### Tabla `estudiantes`

```sql
CREATE TABLE estudiantes (
    id               BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre           VARCHAR(100) NOT NULL,
    email            VARCHAR(100) NOT NULL UNIQUE,
    edad             INT NULL,
    curso            VARCHAR(50) NULL,
    promedio         DECIMAL(3,2) NULL,   -- rango: 0.00 – 9.99
    fecha_registro   DATE NULL,
    activo           TINYINT(1) NOT NULL DEFAULT 1,
    created_at       TIMESTAMP NULL,
    updated_at       TIMESTAMP NULL
);
```

### Seeder

`EstudianteSeeder` inserta 10 estudiantes de prueba con nombres, emails, edades (15–20), cursos y promedios aleatorios.

```bash
php artisan db:seed --class=EstudianteSeeder
```

---

## Validaciones

### Al crear (`EstudianteStoreRequest`)

| Campo | Reglas |
|---|---|
| `nombre` | requerido, string, máx 100 |
| `email` | requerido, formato email, **único en tabla**, máx 100 |
| `edad` | opcional, entero, mín 0 |
| `curso` | opcional, string, máx 50 |
| `promedio` | opcional, numérico, 0–10 |
| `fecha_registro` | opcional, fecha válida |
| `activo` | booleano |

### Al editar (`EstudianteUpdateRequest`)

Idéntico al anterior, excepto que el email puede ser el mismo del estudiante que se está editando:

```php
Rule::unique('estudiantes', 'email')->ignore($estudianteId)
```

---

## Instalación y Configuración

```bash
# 1. Clonar e instalar dependencias
composer install

# 2. Configurar entorno
cp .env.example .env
php artisan key:generate

# 3. Configurar base de datos en .env
DB_CONNECTION=mysql
DB_DATABASE=academix
DB_USERNAME=root
DB_PASSWORD=

# 4. Ejecutar migraciones y seeders
php artisan migrate
php artisan db:seed

# 5. Iniciar servidor de desarrollo
php artisan serve
```

Acceder en: `http://localhost:8000`

---

## Tecnologías Utilizadas

| Tecnología | Versión | Uso |
|---|---|---|
| Laravel | 11.x | Framework backend (MVC, ORM, validaciones) |
| PHP | 8.2+ | Lenguaje del servidor |
| Bootstrap | 5.3.3 | Componentes UI (modales, grid, badges) |
| Be Vietnam Pro | — | Tipografía (Google Fonts) |
| MySQL / SQLite | — | Base de datos |
| Blade | — | Motor de plantillas de Laravel |
