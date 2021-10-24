<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class NewsShowRequest extends FormRequest
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
            'category' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'min:3', 'max:500'],
            'description' => ['required', 'string', 'min:3'],
            'name' => ['required', 'string'],
            'status' => ['required', 'string'],
            //'image' => ['required', 'string']
        ];
    }
}
