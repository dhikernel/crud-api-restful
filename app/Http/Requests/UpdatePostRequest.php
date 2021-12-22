<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdatePostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => [
                'required', 'string',
            ],
            'content' => [
                'required', 'string',
            ]
        ];
    }

    public function authorize()
    {
        return Gate::allows('post_access');
    }
}
