<?php

namespace App\Http\Requests\Work;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
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
            'rating' => ['bail', 'required', 'integer', 'min:1', 'max:5']
        ];
    }
    public function messages()
    {
        return [
            'min' => 'Минимальная оценка :min',
            'required' => 'Поле обязательно для заполнения',
            'max' => 'Максимумальная оценка :max',
            'email' => 'Не коректный Email адрес',
            'string'  => 'Поле должно быть строкой',
            'email.unique' =>'Пользователь с таким Email уже существует',
            'role_id.exists' => 'Такая Роль не существует',
            'rating.integer' => 'Не коректно задан параметр Роли'
        ];
    }
}
