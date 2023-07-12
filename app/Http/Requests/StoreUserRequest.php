<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\Permission\Models\Role;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->hasRole('Administrador');;
    }

    public function rules(): array
    {
        $user = $this->route('user');

        return  array_merge(
            !$user || $this->password
                ? ['password' => 'required|string|max:255']
                : [],
            [
                'name' => 'required|string|max:255',
                'cargo' => 'nullable|string|max:255',
                'roles.*' => 'exists:' . Role::class . ',id',
                'email' => [
                    'nullable',
                    'required',
                    'email',
                    'unique:users,email,'.$user?->id ?? 0
                ],
                'roles' => 'array',
            ]
        );
    }

    protected function passedValidation()
    {
        $this->offsetUnset('_token');

        if ($this->password != null) {
            $this->merge([
                'password' => bcrypt($this->password),
            ]);
        } else {
            $this->offsetUnset('password');
        }
    }
}
