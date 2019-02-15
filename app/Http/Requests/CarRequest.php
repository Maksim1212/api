<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'name' => 'required|max:30',
            'age' => 'required|max:2',
            'free' => 'required|max:20',
            'condition' => 'required|max:50',
            'start_route_at' => 'required',
            'finish_route_at' => 'required',
            'start_repairs_at' => 'required',
            'finish_repairs_at' => 'required',
        ];
    }
}
