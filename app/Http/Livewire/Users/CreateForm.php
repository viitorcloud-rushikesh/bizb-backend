<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class CreateForm extends Component
{
	public $action;
	public $method;
	public $elementId;
	public $submitText;
	public $submitEvent;

	public $username;
	public $name;
	public $email;
	public $mobile;
	public $password;
	public $password_confirmation;

	public function mount($action = '#', $method = 'GET', $id = '', $submitText = 'Save', $submitEvent = 'submit')
	{
		$this->elementId = $id;
		$this->action = $action;
		$this->method = $method;
		$this->submitText = $submitText;
		$this->submitEvent = $submitEvent;
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
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'max:255'],
            'password_confirmation' => ['required'],
            'mobile' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.users.create-form');
    }
}
