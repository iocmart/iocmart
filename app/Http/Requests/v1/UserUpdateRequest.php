<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
    	return true;
    }

    public function rules(): array
    {
    	$user = $this->route()->parameter('user') ?: $this->user('api');
        return [
			'name' => 'required|string|min:3',
			'email' => 'required|email|unique:users,email,'.$user->id,
			'phone.phone' => 'required|phone',
			'phone.phone_country' => 'required_with:phone.phone'
        ];
    }
}
