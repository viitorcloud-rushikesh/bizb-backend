<button type="{{ isset($type) ? $type : 'button' }}" {{ $attributes->merge(['class' => 'btn']) }}
    {{ isset($isDisabled) ? 'disabled' : '' }}>
    @if (isset($icon))
    <i class="{{ $icon }} mr-1"></i>
    @endif
    {{ $slot }}
</button>