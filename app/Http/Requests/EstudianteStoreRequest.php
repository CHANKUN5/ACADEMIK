<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EstudianteStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:estudiantes,email|max:100',
            'edad' => 'nullable|integer|min:0',
            'curso' => 'nullable|string|max:50',
            'promedio' => 'nullable|numeric|min:0|max:10',
            'fecha_registro' => 'nullable|date',
            'activo' => 'boolean',
        ];
    }
}
