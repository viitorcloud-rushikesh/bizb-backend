<select {{ $attributes->merge(['class' => 'js-select2 form-control']) }} id="{{ $id }}" name="{{ $name }}" data-placeholder="{{ $placeholder }}" style="width: 100%;">
    {{ $slot }}
</select>