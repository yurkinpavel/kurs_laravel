<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET': {
                    return [];
                }
            case 'HEAD': {
                    return [
                        'title' => ['required', 'string', 'min:3', 'max:300', 'unique:news,title'],
                        'short_discraption' => ['required', 'string', 'min:10', 'max:300'],
                        'text' => ['required', 'string', 'min:100'],
                        'is_private' => ['nullable', 'boolean'],
                    ];
                }
            default:
                return [];
        }



    }
}
