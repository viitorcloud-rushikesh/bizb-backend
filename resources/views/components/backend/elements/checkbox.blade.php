@props([
		'labelClass' => '',
		'name' => '',
		'inputClass' => '',
		'id' => '',
		'checked' => false,
		'inline' => false,
		'value' => '',
	])

<div {{ $attributes->merge(['class' => $inline ? 'custom-control custom-checkbox custom-control-inline':'custom-control custom-checkbox']) }}>
	<input type="checkbox" class="custom-control-input {{ $inputClass }}" id="{{ !empty($id) ? $id : $name }}" name="{{ !empty($name) ? $name : $id }}" {{ $checked ? 'checked' : '' }} wire:model="{{ $name }}" value="{{ $value }}">
	<label for="{{ !empty($id) ? $id : $name }}" class="custom-control-label {{ $labelClass }}">{{ $slot }}</label>
</div>
