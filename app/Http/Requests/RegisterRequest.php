<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:4'
            ],
            'username' => [
                'required',
                'min:8',
                'unique:users,username'
            ],
            'password' => [
                'required',
                'min:8'
            ],
        ];
    }

    public function getName()
    {
        return $this->get('name');
    }
    public function getUserName()
    {
        return $this->get('username');
    }
    public function getPass()
    {
        return $this->get('password');
    }

    public function getStoreData(): array
    {
        return [
            'name' => $this->getName(),
            'username' => $this->getUserName(),
            'password' => Hash::make($this->getPass()),
        ];
    }
}
