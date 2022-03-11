<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:60',
            'description' => 'required|max:100',
            'content' => 'required',
            'image' => 'image|max:20000',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required.',
            'title.max' => 'Name must not be longer than :max characters.',
            'image.image' => 'Uploaded file must be an image.',
            'image.max' => 'Uploaded file must not be larger than :max kilobytes.',
            'category_id.exists' => 'Selected category does not exist in the database.'
        ];
    }
}
