<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProductSubfamilyRequest extends FormRequest
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
            'title' => 'required|min:2|max:255',
            'desktop_header_image' => 'required',
            'mobile_header_image' => 'required',
            'desktop_header_video' => 'nullable|file|max:2000|mimetypes:video/mp4,video/ogg',
            'mobile_header_video' => 'nullable|file|max:2000|mimetypes:video/mp4,video/ogg',
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
            'title' => 'Título',
            'desktop_header_image' => 'Imagen header (desktop)',
            'mobile_header_image' => 'Imagen header (mobile)',
            'desktop_header_video' => 'Video header (desktop)',
            'mobile_header_video' => 'Video header (mobile)',
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
