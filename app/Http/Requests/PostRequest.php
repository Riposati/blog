<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:8',
            'content' => 'required',
        ];
    }

    /**
     *
     * Obtém as mensagens de validações em português
     * @return array
     *
     */

    public function messages()
    {

        return [
            'title.required' => 'O campo título é obrigatório',
            'title.min' => 'informe pelo menos 8 letras no campo título!',
            'content.required' => 'O campo conteúdo é obrigatório',
        ];
    }
}
