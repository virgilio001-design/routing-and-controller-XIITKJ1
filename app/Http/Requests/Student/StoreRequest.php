<?php

namespace App\Http\Requests\Student;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nis' => ['required', 'string', 'digits:7', 'unique:students,nis'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'gender' => ['required', 'string', 'in:L,P'],
            'major' => ['required', 'string', 'in:AKL,TKJ,BiD'],
            'class' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'nis.required' => 'NIS wajib diisi.',
            'nis.string' => 'NIS harus berupa string.',
            'nis.digits' => 'NIS harus terdiri dari 7 digit.',
            'nis.unique' => 'NIS sudah digunakan.',

            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa string.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'email.unique' => 'Email sudah digunakan.',

            'gender.required' => 'Jenis kelamin wajib diisi.',
            'gender.string' => 'Jenis kelamin harus berupa string.',
            'gender.in' => 'Jenis kelamin harus L atau P.',

            'major.required' => 'Jurusan wajib diisi.',
            'major.string' => 'Jurusan harus berupa string.',
            'major.in' => 'Jurusan harus AKL, TKJ, atau BiD.',

            'class.required' => 'Kelas wajib diisi.',
            'class.string' => 'Kelas harus berupa string.',
        ];
    }
}
