<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

class CategoryRequest extends FormRequest
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
        // return [
        //     'name' => "required|string|min:3|max:255|unique:categories,name,$id",
        //     // Rule::unique('categories', 'name')->ignore($id)
        //     'parent_id' => [
        //         'nullable', 'int', 'exists:categories,id'
        //     ],
        //     'image' => 'image|max:1048576|dimensions:width=100,height:100',
        //     'status' => 'required|in:active,archived',

        // ];
        $id = $this->route('category');
        return Category::rules($id);
    }

    public function messages() {
        return [
            'name.required' => 'test'
        ];
    }
}
