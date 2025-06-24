<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

/**
 * 
 * property-red string $name
 * * property-red string $email
 * * property-red string $password
 */


class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name'=> ['required', 'string'],      
            'lastname'=> ['required', 'string'],            
            'email' => ['required', 'email'], 'confirmed', 'unique:user',
            'password' => ['required',
            Password::min(8)
              
            ],

        ];
    }

    public function tryToRegister()
    {
        //1. criar um usuario
            $user = new User;
            $user->name = $this->name;
            $user->lastname = $this->lastname;
            $user->password = $this->password;
            $user->email = $this->email;
            $user->save();

        //2. logar com esse usuario

            auth()->login ($user);

            return true;
    }


}
