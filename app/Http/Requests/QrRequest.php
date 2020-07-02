<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QrRequest extends FormRequest
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
        switch ( $this->method() ) {
            case "GET":
            case "DELETE":
            case "PUT":
                return [];

            case "POST": {
                return [
                    'type'  => 'required',
                    'text_message'  => 'required|min:2|max:200',
                ];
                break;
            }
        }
    }
}
