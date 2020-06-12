<div class="col-md-12">
    <h2 class="content-heading">Roles</h2>
	<div class="form-group">
	@foreach($roles as $id => $role)
		<x-elements.radio wire:model="userRole" class="custom-control custom-radio custom-control-inline" id="{{ $id }}" name="role" value="{{$id}}" checked="{{($id == $userRole) ? true : false}}">
			{{ $role }}
		</x-elements.radio>
	@endforeach
	</div>
    <h2 class="content-heading">Permissions</h2>
	<div class="form-group">
	@foreach($permissions as $id => $permission)
		<x-elements.checkbox class='custom-control custom-checkbox custom-control-inline' id="permission{{$id}}" name="permissions[]" value="{{$id}}" checked="{{in_array($id, $userPermissions) ? true : false}}">
			{{ $permission }}
		</x-elements.checkbox.checkboxfield>
	@endforeach
	</div>
</div>