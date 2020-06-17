@props([
		'id' => 'form-id',
		'name' => 'form',
		'isInline' => '', 
		'action' => '#', 
		'method' => 'GET',
		'enctype' => '',
		'target' => '',
		'novalidate' => '',
		'autocomplete' => '',
		'onSubmit' => 'javascript:void(0)'
	])

<form 
		{{-- Form class attribute --}}
		id="{{ !empty($id) ? $id : $name }}"
		name="{{ !empty($name) ? $name : $id }}" 
		{{ $attributes->merge(['class' => (!empty($isInline)) ? 'form-inline' : '']) }} 
		action="{{ $action }}"
		enctype="{{ $enctype }}"
		autocomplete="{{ $autocomplete }}"
		novalidate="{{ $novalidate }}" 
		target="{{ $target }}" 
		method="{{ (strtoupper($method) != 'GET') ? 'POST' : 'GET' }}"
		onSubmit="{{ $onSubmit }}"
	>
	{{-- CSRF token will be generated for POST, PUT, DELETE methods --}}
	@if(strtoupper($method) != 'GET')
		@csrf
	@endif
	{{-- If method is PUT or DELETE then only below if condition will execute --}}
	@if(in_array(strtoupper($method), ['PUT', 'DELETE']))
		{{ method_field($method) }}
	@endif
	{{-- Form body --}}
	{{ $slot }}
</form>