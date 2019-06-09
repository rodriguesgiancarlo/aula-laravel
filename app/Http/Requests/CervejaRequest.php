<?php
// https://laravel.com/docs/5.8/validation

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CervejaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
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
            'nome' => 'required|max:255',
            'cervejaria_id' => 'required',
            'ingredientes' => 'required'
        ];
    }


    /* Mensagens de erro personalizadas */
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome deve ser preenchido',
            'nome.max' => 'O campo nome não pode exceder 255 caracteres',
            'cervejaria_id.required'  => 'Você deve selecionar uma cervejaria fabricante',
            'ingredientes.required'  => 'Selecione ao menos um ingrediente',
        ];
    }
}
