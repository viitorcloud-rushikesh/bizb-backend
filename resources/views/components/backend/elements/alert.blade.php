<div {{ $attributes->merge(['class' => isset($icon) ? 'alert d-flex align-items-center' : (isset($dismissable) ? 'alert d-flex align-items-center alert-dismissable' : 'alert')]) }}  role="alert">

    @if (isset($icon) && !isset($appendIcon))
    <div class="flex-00-auto">
        <i class="{{ $icon }}"></i>
    </div>
    @endif

    @isset($title)
    <h3 class="alert-heading font-size-h4 my-2">{{ $title }}</h3>
    @endisset

    @if (isset($icon) || isset($dismissable))
    <div class="flex-fill {{ (isset($appendIcon) || isset($dismissable)) ? 'mr-3' : 'ml-3' }}">
        {{ $slot }}
    </div>
    @else
        {{ $slot }}
    @endif

    @if (isset($icon) && isset($appendIcon))
    <div class="flex-00-auto">
        <i class="{{ $icon }}"></i>
    </div>
    @endif

    @if(isset($dismissable))
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    @endif

</div>
