<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => ['required', 'numeric', 'exists:categories,id'],
            'title' => ['required', 'string', 'min:3', 'max:300'],
            'slug' => ['required', 'string', 'min:3', 'max:300'],
            'short_discraption' => ['required', 'string', 'min:10', 'max:300'],
            'is_private' => ['nullable', 'boolean'],
        ];
    }

   public function attributes(): array{
    return [
        'title' => '"Название категории"',
        'slug' => '"Слаг"',
        'short_discraption' => '"Короткое описание"'
    ];
   }

}
