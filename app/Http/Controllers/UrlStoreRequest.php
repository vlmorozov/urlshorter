<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Http\FormRequest;

class UrlStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'url' => 'required',
        ];
    }
}
