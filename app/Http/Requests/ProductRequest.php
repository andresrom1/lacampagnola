<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_family_id' => 'required',
            'category_id' => 'required',
            'title' => 'required|min:2|max:255',
            'image' => 'required',
            'tags' => 'nullable',
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
            'product_family_id' => 'Familia de productos',
            'category_id' => 'Categoria de productos',
            'title' => 'Título',
            'image' => 'Imagen',
            'youtube_video' => 'Enlace a video YouTube',
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
