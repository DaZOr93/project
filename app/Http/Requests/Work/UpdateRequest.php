<?php

namespace App\Http\Requests\Work;

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
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],

            'body' => ['required', 'string', 'min:200'],
            'image' => ['nullable', 'image','max:2048']
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
            'image.max' => 'Максимальный размер изображения 2 Мбайт',
            'image' => 'Только изображения'

        ];
    }
}
