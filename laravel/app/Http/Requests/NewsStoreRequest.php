<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
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
    public function rules(Category $category): array
    {
        return [
            'category_id' => ['required', 'integer'],
            'title' => ['required', 'string', 'min:3', 'max:500'],
            'description' => ['required', 'string', 'min:3'],
            'name' => ['required', 'string'],
            'status' => ['required', 'string'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Данное поле с именем :attribute обязательно необходимо заполнить',
            'min' => [
                'string' => 'Поле :attribute должно содержать не меньше :min символов.'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'категория новости',
            'title' => 'заголовок',
            'description' => 'описание',
            'name' => 'имя автора'
        ];
    }
}
