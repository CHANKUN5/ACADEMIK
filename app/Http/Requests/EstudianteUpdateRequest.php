<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EstudianteUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $estudianteId = $this->route('estudiante')?->id;

        return [
            'nombre' => 'required|string|max:100',
            'email' => ['required', 'email', 'max:100', Rule::unique('estudiantes', 'email')->ignore($estudianteId)],
            'edad' => 'nullable|integer|min:0',
            'curso' => 'nullable|string|max:50',
            'promedio' => 'nullable|numeric|min:0|max:10',
            'fecha_registro' => 'nullable|date',
            'activo' => 'boolean',
        ];
    }
}
