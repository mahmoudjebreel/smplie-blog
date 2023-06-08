<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:20',
            'full_text'=>'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|numeric|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id', // Validate each tag ID exists in the "tags" table
        ];
    }
}
