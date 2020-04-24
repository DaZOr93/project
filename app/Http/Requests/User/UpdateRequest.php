<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $id = request()->route('user')->id;
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => ['nullable', 'string', 'min:8'],
            'role_id' => ['bail', 'required', 'integer', 'exists:roles,id']
        ];
    }

    public function messages()
    {
        return [
            'min' => 'Минимум :min символа',
            'required' => 'Поле обязательно для заполнения',
            'max' => 'Максимум :max символа',
            'email' => 'Не коректный Email адрес',
            'string'  => 'Поле должно быть строкой',
            'email.unique' =>'Пользователь с таким Email уже существует',
            'role_id.exists' => 'Такая Роль не существует',
            'role_id.integer' => 'Не коректно задан параметр Роли'
        ];
    }
}
