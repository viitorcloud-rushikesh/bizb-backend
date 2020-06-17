<li {{ $attributes->merge(['class' => 'nav-item']) }}>
    <a class="nav-link {{ isset($isActive) && $isActive == 'true' ? 'active' : '' }}" href="{{ $href }}">{{ $slot }}</a>
</li>