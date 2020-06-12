@props([
		'labelClass' => '',
		'name' => '',
		'inputClass' => '',
		'id' => '',
		'placeholder' => '',
		'readonly' => false,
		'disabled' => false,
		'rows' => '',
	])

<div {{ $attributes->merge(['class' => 'form-group']) }}>
    <label for="{{ !empty($id) ? $id : $name }}" class="{{ $labelClass }}" >{{ $slot }}</label>
    <textarea class="form-control {{ $inputClass }}" id="{{ !empty($id) ? $id : $name }}" name="{{ !empty($name) ? $name : $id }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}" {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }}></textarea>
</div>