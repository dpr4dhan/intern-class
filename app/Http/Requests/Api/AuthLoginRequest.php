<?php

namespace App\Http\Requests\Api;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     @OA\Property(
 *     property="email", type="string"
 *      ),
 *     @OA\Property(
 *     property="password", type="string"
 *      )
 * )
 */
class AuthLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
                'email' => ['required', 'email'],
                'password' => ['required']
            ];
    }
}
