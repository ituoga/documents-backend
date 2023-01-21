<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFileRequest extends Request
{
    public function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'group_name' => 'nullable|string',
            'document_direction' => 'nullable|string',
            'file' => 'nullable|file',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
