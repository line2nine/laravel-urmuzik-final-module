<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPlaylistRequest extends FormRequest
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
            'title' => 'required|regex:/^([a-zA-Z0-9\.]+)(\s[a-zA-Z0-9\.]+)*$/|min:2|max:15',
        ];
    }
}
