@props([
'isPrepend' => false,
'isAppend' => false,
'prependClass' => '',
'appendClass' => '',
'prependItem'=> '',
'appendItem'=> '',
'inputType' => 'text',
'id' => '',
'name' => '',
'value' => '',
'inputClass' => '',
'placeholder' => '',
'readonly' => false,
'disabled' => false,
])

<div {{ $attributes->merge(['class' => 'input-group']) }}>

	@if ($isPrepend)
	<div class="input-group-prepend {{ isset($prependClass) ? $prependClass : '' }}">
		@isset($prependItem)
		{{ $prependItem }}
		@endisset
	</div>
	@endif

	<input type="{{ $inputType }}" id="{{ !empty($id) ? $id : $name }}" name="{{ !empty($name) ? $name : $id }}"
		value="{{ $value }}" class="form-control {{ $inputClass }} " placeholder="{{ $placeholder }}"
		{{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }}>

	@if ($isAppend)
	<div class="input-group-append {{ isset($prependClass) ? $prependClass : '' }}">
		@isset($appendItem)
		{{ $appendItem }}
		@endisset
	</div>
	@endif

</div>