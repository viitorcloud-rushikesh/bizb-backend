<a class="btn btn-primary btn-sm mr-1" href="{{route('admin.users.edit', ['user' => $model->id])}}">
	<i class="fas fa-pencil-alt"></i>
</a>

<a href="javascript:void(0);"
	class="btn btn-danger btn-sm js-swal-confirm"
	data-href="{{ route('admin.users.destroy', $model->id) }}" data-entity="USER" title="Delete"
   >
	<i class="fas fa-trash"></i>
</a>