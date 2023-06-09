<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
                'title'=> ['required', 'max:255'],
                'short_description' => ['required'],
                'published_at' => ['required', 'date_format:Y-m-d h:i A'],
                'caption.*' => ['required'],
                'photo.*' => ['required_without:selected_photo.*']
            ];
    }

    public function messages(){
       return [
            'required' => 'Required.',
            'required_without' => 'Required.'
        ];
    }
}
