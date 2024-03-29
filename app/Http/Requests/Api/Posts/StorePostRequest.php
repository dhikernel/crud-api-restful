<?php

namespace App\Http\Requests\Api\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_user' => 'integer',
            'title' => 'required|unique:posts|min:3',
            'content' => 'required',
        ];
    }

    public function attributes(){

        return [
            'id_user' => 'id do usuário',
            'title' => 'título',
            'content' => 'conteúdo'
        ];
    }
}
