<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTechRequest extends FormRequest
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
            'name'          => ['required','unique:services,name,'.$this->id],
            'description'   => ['required'],
            'image_file'    => ['image'],
            'teches'        => ['required','array'],
            'teches.*'      => ['required','exists:teches,id']
        ];
    }
}
