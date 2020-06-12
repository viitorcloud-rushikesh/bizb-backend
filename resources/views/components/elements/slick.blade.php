<div {{ $attributes->merge(['class' => 'js-slider']) }} data-dots="{{ $dots }}" data-arrows="{{ $arrow }}" data-slides-to-show="{{ $slides }}">
    {{ $slot }}
</div>