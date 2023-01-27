<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class StoreFileRequest extends Request
{
    public function prepareForValidation(): void
    {
        $files = collect(request()->file('files'));
        if ($files->count() > 1) {
            $group_name = Str::random(10);
        }
        $this->merge([
            'user_id' => auth()->user()->id,
            'group_name' => $group_name ?? null,
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
            'files' => 'nullable|array',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
