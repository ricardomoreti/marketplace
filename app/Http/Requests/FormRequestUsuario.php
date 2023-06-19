<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class FormRequestUsuario extends FormRequest
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
                    'name' => 'required',
                    'email' => 'required',
                    'password' => 'required'
                ];            
            }

            return $request;
        }
    }
