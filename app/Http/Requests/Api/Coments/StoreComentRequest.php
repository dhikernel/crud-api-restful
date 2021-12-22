<?php

namespace App\Http\Requests\Api\Coments;

use Illuminate\Foundation\Http\FormRequest;

class StoreComentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return true;
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
            'id_post' => 'integer',
            'coment' => 'required|unique:coments|min:3'
        ];
    }

    public function attributes(){

        return [
            'id_user' => 'id do usuário',
            'id_post' => 'id da postagem',
            'coment' => 'comentário'
        ];
    }
}