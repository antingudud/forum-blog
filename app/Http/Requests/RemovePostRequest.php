<?php

namespace App\Http\Requests;

use App\Repositories\PostRepository;
use Illuminate\Foundation\Http\FormRequest;

class RemovePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->id() === PostRepository::getUIDByUrl($this->route('url')))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['required', 'integer', 'digits_between:9,11'],
            'confirmation' => ['required']
        ];
    }

    /**
     * Error messages
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'confirmation.required' => 'No confirmation.'
        ];
    }
}
