<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EdicaoDesenvolvedorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'string',
            'sexo' => 'string|max:1',
            'idade' => 'integer',
            'hobby' => 'string',
            'datanascimento' => 'date|date_format:Y-m-d'
        ];
    }
}
