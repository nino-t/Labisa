<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'name' => 'required|max:255',
            'slug' => 'required',
            'description' => 'required',
            'message' => 'required',
            'contact' => 'required',
            'target_amount' => 'required',
            'expired_date' => 'required',
            'thumbnail' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ];
    }
}
