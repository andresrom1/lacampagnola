<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class HomeBannerRequest extends FormRequest
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
            'title' => 'nullable|min:2|max:255',
            'text' => 'nullable|min:2|max:255',
	    'desktop_image' => 'required',
	    'mobile_image' => 'required',
            'position' => 'numeric'
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
            'text' => 'Texto',
            'desktop_image' => 'Imagen background (desktop)',
            'mobile_image' => 'Imagen background (mobile)',
            'link' => 'Enlace',
            'youtube_video_id' => 'ID YoutTube',
            'is_visible' => 'Visible',
            'position' => 'Posición'
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
