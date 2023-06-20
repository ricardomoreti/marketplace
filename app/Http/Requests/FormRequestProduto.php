<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestProduto extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $request = [];
        if ($this->method() == "POST" || $this->method() == "PUT") {
            return [
                'sku' => 'required',
                'nome' => 'required',
                'preco' => 'required',
                'genero' => 'required'
            ];            
        }

        return $request;
    }
}
