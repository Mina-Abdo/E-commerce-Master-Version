<?php

namespace App\Http\Requests\RegionApi;

use Illuminate\Foundation\Http\FormRequest;

class RegionApiRequest extends FormRequest
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
        return [
            'city_id' => ['required', 'integer']
        ];
    }
}
