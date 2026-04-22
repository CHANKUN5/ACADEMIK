<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estudiante;
use Carbon\Carbon;

class EstudianteSeeder extends Seeder
{
    public function run(): void
    {
        $nombres = ['Ana García', 'Luis Martínez', 'María López', 'Carlos Ruiz', 'Sofía Hernández',
                    'Pedro González', 'Laura Sánchez', 'Diego Flores', 'Carmen Torres', 'Javier Vega'];
        $cursos = ['Matemáticas', 'Física', 'Química', 'Biología', 'Historia', 'Lenguaje'];
        
        foreach ($nombres as $index => $nombre) {
            Estudiante::create([
                'nombre' => $nombre,
                'email' => strtolower(str_replace(' ', '.', $nombre)) . '@colegio.edu',
                'edad' => rand(15, 20),
                'curso' => $cursos[array_rand($cursos)],
                'promedio' => round(rand(700, 1000) / 100, 2),
                'fecha_registro' => Carbon::now()->subDays(rand(10, 200))->toDateString(),
                'activo' => rand(0, 1) ? true : false,
            ]);
        }
    }
}
