<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutoStoreRequest extends FormRequest
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
            'make' => 'required|string|min:3|max:191',
            'model' => 'required|string',
            'photo' => 'nullable|image'
        ];
    }

    public function getMake()
    {
        return strip_tags($this->input('make'));
    }

    public function getModel()
    {
        return strip_tags($this->input('model'));
    }

    public function getPhoto()
    {
        return $this->file('photo');
    }
}
