<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Validation\Rule;

class UpdateForm extends Component
{
	public $action;
	public $method;
	public $elementId;
	public $submitText;
	public $submitEvent;

	public $user;
	public $username;
	public $name;
	public $email;
	public $mobile;
	public $password;
	public $password_confirmation;

	public function mount($action = '#', $method = 'GET', $id = '', $submitText = 'Save', $submitEvent = 'submit', $user = null)
	{
		$this->user = $user;
		$this->elementId = $id;
		$this->action = $action;
		$this->method = $method;
		$this->submitText = $submitText;
		$this->submitEvent = $submitEvent;

        $this->username = $this->user->username;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->mobile = $this->user->mobile;
	}

    public function updated($field)
    {
        $this->validateOnly($field, $this->formValidationRules());
    }

    public function submit()
    {
        $this->validate($this->formValidationRules());
        $this->emit('submitForm', $this->elementId);
    }

    public function formValidationRules()
    {
        return [
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->user)],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
            'mobile' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.users.update-form');
    }
}
