<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required | min:3',
            'body' => 'required',
            'excerpt' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('postUpdate.title.required'),
            'title.min' => __('postUpdate.title.min'),
            'body.required' => __('postUpdate.body.required'),
            'excerpt.required' => __('postUpdate.excerpt.required'),
            'category_id.required' => __('postUpdate.category_id.required'),
            'tags' => __('postUpdate.tags.required')
        ];
    }
}
