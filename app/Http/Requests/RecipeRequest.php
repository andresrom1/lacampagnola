<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2|max:255',
            'icon_image' => 'required',
            'ingredients' => 'required',
            'preparation' => 'required',
            'youtube_video' => 'nullable',
            'tags' => 'required',
            'images' => 'required',
            'images.*' => 'nullable|image',
            'meta_image' => 'base64image:5000',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'Título',
            'icon_image' => 'Imagen',
            'ingredients' => 'Ingredientes',
            'preparation' => 'Preparación',
            'youtube_video' => 'Enlace a video YouTube',
            'images' => 'Imágenes',
            'in_home' => 'Destacada en la home',
            'tags' => 'Tags',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
