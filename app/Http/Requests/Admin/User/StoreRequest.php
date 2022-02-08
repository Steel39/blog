<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|e-mail|unique:users',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле это должно оставаться не пустым',
            'name.string' => 'Здесь строковым должно быть значение',


            'email.required' => 'Поле это должно оставаться не пустым',
            'email.string' => 'Здесь строковым должно быть значение',
            'email.e-mail' => 'Ваша почта вид должна иметь, подобный user@mail.domain',
            'email.unique' => 'Почта такая у нас уже есть',
        ];
    }
}
