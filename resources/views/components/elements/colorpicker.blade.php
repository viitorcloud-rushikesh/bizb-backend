@props([
'id' => '',
'name' => '',
'format' => 'hex',
'value' => '',
'inputClass' => '',
'isInline' => false,
'isComponent' => false
])

@if ($isInline)
<div {{ $attributes->merge(['class' => 'js-colorpicker']) }} id="{{ $id }}" data-container="#{{ $id }}"
    data-format="{{ $format }}" data-inline="{{ $isInline }}" data-color="{{ $value }}"></div>
@elseif($isComponent)
<div class="js-colorpicker input-group" data-format="{{ $format }}">
    <input type="text" class="{{ $inputClass }}" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}">
    <div class="input-group-append">
        <span class="input-group-text colorpicker-input-addon">
            <i></i>
        </span>
    </div>
</div>
@else
<input type="text" {{ $attributes->merge(['class' => 'js-colorpicker']) }} id="{{ $id }}" data-format="{{ $format }}"
    name="{{ $name }}" value="{{ $value }}">
@endif