@props([
		'labelClass' => '',
		'name' => '',
		'inputClass' => '',
		'id' => '',
		'checked' => false,
		'inline' => false,
	])

<div {{ $attributes->merge(['class' => $inline ? 'custom-control custom-switch custom-control-inline':'custom-control custom-switch']) }}>
	<input type="checkbox" class="custom-control-input {{ $inputClass }}" id="{{ !empty($id) ? $id : $name }}" name="{{ !empty($name) ? $name : $id }}" {{ $checked ? 'checked' : '' }}>
	<label for="{{ !empty($id) ? $id : $name }}" class="custom-control-label {{ $labelClass }}">{{ $slot }}</label>
</div>