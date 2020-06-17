@if (isset($isDiv))

<div
    class="block {{ (isset($isRounded)) ? 'block-rounded' : '' }} {{ (isset($isHover)) ? 'block-link-pop' : '' }} {{ (isset($isShadow)) ? 'block-link-shadow' : '' }} {{ (isset($isBordered)) ? 'block-bordered' : '' }} {{ $attributes->get('class') }}">

    @include('components.backend.elements._partials._card')

</div>

@else

<a class="block {{ (isset($isRounded)) ? 'block-rounded' : '' }} {{ (isset($isHover)) ? 'block-link-pop' : '' }} {{ (isset($isShadow)) ? 'block-link-shadow' : '' }} {{ (isset($isBordered)) ? 'block-bordered' : '' }} {{ $attributes->get('class') }}"
    href="{{ isset($link) ? $link : "javascript:void(0)" }}">

    @include('components.backend.elements._partials._card')

</a>

@endif
