<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile' => ['required'],
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
            'password.required' => ':attribute is required!',
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
            'password' => 'Password'
        ];
    }
    protected function getValidatorInstance() 
    {
        $request = $this->all();
        unset($request['_token']);
        unset($request['_method']);
        $this->getInputSource()->replace($request);

        /*modify data before send to validator*/
        return parent::getValidatorInstance();
    }
}
