@props([
        'class' => 'btn-block btn-primary',
        'placement' => 'top',
        'caption' => 'Welcome',
        'title' => 'Popover',
        'trigger' => 'hover',
        'animation' => false,
        'content' => 'Description or more info here.'
    ])

<button type="button" class="btn {{ $class }}" data-toggle="popover" data-placement="{{ $placement }}" title="{{ $title }}" data-trigger="{{ $trigger }}" data-animation="{{ $animation }}" data-content="{{ $content }}">
    {{$caption}}
</button>