<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProductFamilyRequest extends FormRequest
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
            'description' => 'nullable',
            'icon_image' => 'required',
            'desktop_header_image' => 'required',
            'mobile_header_image' => 'required',
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
            'description' => 'Descripción',
            'icon_image' => 'Imagen ícono',
            'desktop_header_image' => 'Imagen header (desktop)',
            'mobile_header_image' => 'Imagen header (mobile)',
            'desktop_header_video' => 'Video header (desktop)',
            'mobile_header_video' => 'Video header (mobile)',
            'position' => 'Posición',
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
