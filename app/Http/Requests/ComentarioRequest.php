<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComentarioRequest extends FormRequest
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

            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
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
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'informe pelo menos 8 letras no campo nome!',
            'email.required' => 'email é obrigatório!',
            'comment.required' => 'O campo comentário é obrigatório',
        ];
    }
}
