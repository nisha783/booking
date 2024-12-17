<?php

namespace App\Http\Requests\Auth\Event;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //

            'name'=>'required|max:255 |string',
            'description'=>'required|max:255 |string',
            'category_id'=>'required|max:255 |string',
            'location'=>'required|max:255 |string',
            'price'=>'required|max:255 |string',
            'type'=>'required|max:255 |string',
            'start_time'=>'required|max:255 ',
            'end_time'=>'required|max:255 ',
            'max_attendence'=>'required|max:255 |string',
        ];
    }
}
