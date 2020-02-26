<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'name_user' => 'required | min:3',
            'comment' => 'required | max:100'
        ];
    }

    public function messages()
    {
        return [
            'name_user.required' => 'A name is required',
            'name_user.min' => 'The name size is short',
            'comment.required' => 'A comment is required',
            'comment.max' => 'Comment size is long'
        ];
    }
}
