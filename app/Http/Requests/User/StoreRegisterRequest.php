<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;
use App\Rules\GoogleRecaptcha;
use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => ['required', new GoogleRecaptcha()],
            ['g-recaptcha-response.required', 'The Google reCAPTCHA field is required.'],
        ];
    }
}
