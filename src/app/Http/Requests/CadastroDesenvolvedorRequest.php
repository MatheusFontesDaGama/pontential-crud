<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroDesenvolvedorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|string',
            'sexo' => 'required|string|max:1',
            'idade' => 'required|integer',
            'hobby' => 'required|string',
            'datanascimento' => 'required|date|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O parametro nome é obrigatório',
            'sexo.required' => 'O parametro sexo é obrigatório',
            'idade.required' => 'O parametro idade é obrigatório',
            'hobby.required' => 'O parametro hobby é obrigatório',
            'datanascimento.required' => 'O parametro datanascimento é obrigatório'
        ];
    }
}
