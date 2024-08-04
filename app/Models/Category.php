<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Rules\FilterCategory;
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'parent_id', 'status', 'slug', 'description', 'image'
    ];

    public static function rules($id = 0)
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'unique:categories,name,$id',
                // Rule::unique('categories', 'name')->ignore($id)
                // function($attribute, $value, $fails)
                // {
                //     if(strtolower($value) == 'laravel')
                //     {
                //         $fails('No Laravel....');
                //     }
                // }
                // new FilterCategory(['laravel', 'php']),
                'filter:php,laravel'
            ],
            'parent_id' => [
                'nullable', 'int', 'exists:categories,id'
            ],
            'image' => 'image|max:1048576|dimensions:width=100,height:100',
            'status' => 'required|in:active,archived',

        ];
    }

}
