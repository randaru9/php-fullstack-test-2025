<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestErrorMessage;

class UpdateRequest extends FormRequest
{
    use RequestErrorMessage;

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
            'name' => 'required|string|max:250',
            'slug' => 'required|string|max:100',
            'is_project' => 'nullable|string|max:1',
            'self_capture' => 'nullable|string|max:1',
            'client_prefix' => 'nullable|string|max:4',
            'client_logo' => 'nullable|image|max:2048',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:50',
            'city' => 'nullable|string|max:50',
        ];
    }

    /**
     * Aliases name
     * 
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'slug' => 'Slug',
            'client_logo' => 'Logo',
            'address' => 'Alamat',
            'phone_number' => 'Nomor Telepon',
            'city' => 'Kota',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'string' => ':attribute harus berupa teks.',
            'image.max' => ':attribute tidak boleh lebih dari :max kilobytes.',
            'max' => ':attribute maksimal :max karakter.',
            'image' => ':attribute harus berupa gambar.',
        ];
    }
}
