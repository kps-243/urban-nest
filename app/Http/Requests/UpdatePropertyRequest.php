<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'm2' => 'required|numeric',
            'type' => 'required|string',
            'etat' => 'required|string',
            'nombre_chambres' => 'required|numeric',
            'nombre_salles_de_bain' => 'required|numeric',
            'parking' => 'required|boolean',
            'garage' => 'required|boolean',
            'terrain' => 'required|boolean',
        ];
    }
}
