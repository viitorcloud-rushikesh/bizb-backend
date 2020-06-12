<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Livewire\Component;

class RolePermission extends Component
{
	public $roles;
	public $userRole;
	public $permissions;
	public $user;
	public $userPermissions;

	public function mount($user = null)
	{
		$this->userPermissions = [];
		if($user) {
			$this->user = $user;
			$this->userRole = @$this->user->roles()->first()->id;
			$this->userPermissions = @$this->user->permissions->pluck('id')->toArray();
		}

		$roles = Role::whereNotIn('name', ['superadmin'])->pluck('description', 'id');
		$this->roles = $roles->toArray();

		$permissions = Permission::pluck('description', 'id');
		$this->permissions = $permissions->toArray();
	}

	public function updatedUserRole($value)
	{
		$this->userPermissions = Role::find($value)->permissions->pluck('id')->toArray();
	}

    public function render()
    {
        return view('livewire.users.role-permission');
    }
}
