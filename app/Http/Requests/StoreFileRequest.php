<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFileRequest extends Request
{
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
            'file' => 'required|file',
        ];
    }
}
