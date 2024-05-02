<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExerciceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Vous pouvez ajuster la logique d'autorisation en fonction de vos besoins
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
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif', 
            'duree' => 'required|integer|min:1', 
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'titre.required' => 'Le titre de l\'exercice est requis.',
            'titre.string' => 'Le titre de l\'exercice doit être une chaîne de caractères.',
            'titre.max' => 'Le titre de l\'exercice ne doit pas dépasser :max caractères.',
            'description.required' => 'La description de l\'exercice est requise.',
            'description.string' => 'La description de l\'exercice doit être une chaîne de caractères.',
            'image.required' => 'Une image de l\'exercice est requise.',
            'image.image' => 'Le fichier téléversé doit être une image.',
            'image.mimes' => 'Le fichier image doit être de type :jpeg, :png, :jpg ou :gif.',
            // 'image.max' => 'La taille de l\'image ne doit pas dépasser :max kilo-octets.',
            'duree.required' => 'La durée de l\'exercice est requise.',
            'duree.integer' => 'La durée de l\'exercice doit être un entier.',
            'duree.min' => 'La durée de l\'exercice doit être d\'au moins :min minute.',
        ];
    }
}
