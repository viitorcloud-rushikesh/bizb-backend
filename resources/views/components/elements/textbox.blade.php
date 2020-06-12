@props([
		'labelClass' => '',
		'type' => '',
		'name' => '',
		'inputClass' => '',
		'id' => '',
		'placeholder' => '',
		'readonly' => false,
		'disabled' => false,
		'value' => '',
		'error' => '',
	])
<div {{ $attributes->merge(['class' => '']) }}>
    <label for="{{ !empty($id) ? $id : $name }}" class="{{ $labelClass }}" >{{ $slot }}</label>
    <input type="{{ $type }}" id="{{ !empty($id) ? $id : $name }}" name="{{ !empty($name) ? $name : $id }}" value="{{ $value }}" class="form-control {{ $inputClass }} "  placeholder="{{ $placeholder }}" {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }}>
    {{ $error }}
</div>