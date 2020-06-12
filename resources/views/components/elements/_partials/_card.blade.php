@if(isset($withHeader) && isset($title))
<div class="block-header block-header-default">
    <h3 class="block-title">
        {{ $title }}
        @isset($subtitle)
        <small> {{ $subtitle }} </small>
        @endisset
    </h3>
</div>
@endif

<div
    class="block-content {{ isset($blockClass) ? $blockClass : '' }}">
    {{ $slot }}
</div>