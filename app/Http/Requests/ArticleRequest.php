<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public $rules = [
        'title' => 'required|string|min:3|max:255',
        'content' => 'required|string|min:3|max:255',
        'image' => 'sometimes|required|image',
        'categories' => 'required|array',
    ];
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
        foreach ($this->categories as $key => $value) {
            $this->rules['categories'.$key] = 'exists:categories,id';
        }
        return $this->rules;
    }

    public function response(array $errors)
    {
        return response()->json($errors, 400);
    }
}