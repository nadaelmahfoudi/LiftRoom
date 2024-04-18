<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgrammeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titre' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif', 
            'sessions.*' => 'required',
            'days.*' => 'required',
            'skills.*' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titre.required' => 'Le titre du programme est requis',
            'description.required' => 'La description du programme est requise',
            'image.required' => 'Une image de l\'exercice est requise.',
            'image.image' => 'Le fichier téléversé doit être une image.',
            'image.mimes' => 'Le fichier image doit être de type :jpeg, :png, :jpg ou :gif.',
            'sessions.*.required' => 'Veuillez sélectionner une session',
            'days.*.required' => 'Veuillez spécifier un jour pour chaque session',
            'skills.*.required' => 'Veuillez spécifier un objectif pour chaque session',
        ];
    }
}
