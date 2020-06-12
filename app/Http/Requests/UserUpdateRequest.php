<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->user)],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
            'mobile' => ['required'],
            'current_password' => ['sometimes', 'required', 'string', new MatchOldPassword],
            'password' => ['sometimes', 'required', 'string', 'min:8', 'confirmed'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute is required!',
            'name.min' => ':attribute must be of minimum 3 characters',
            'name.max' => ':attribute can be of maximum 50 characters',
            'email.required' => ':attribute is required!',
            'phone.required' => ':attribute is required!',
        ];
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'username' => 'Username',
            'name' => 'Name',
            'email' => 'Email address',
            'phone' => 'Phone number',
        ];
    }
    protected function getValidatorInstance() 
    {
        $request = $this->all();
        unset($request['_token']);
        unset($request['_method']);

        if(empty($request['password'])) {
            unset($request['password']);
            unset($request['current_password']);
            unset($request['password_confirmation']);
        }

        $this->getInputSource()->replace($request);

        /*modify data before send to validator*/
        return parent::getValidatorInstance();
    }
}
