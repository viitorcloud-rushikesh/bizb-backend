<div {{ $attributes->merge(['class' => 'block block-rounded mb-1']) }}>
    <div class="block-header block-header-default" role="tab" id="{{ $parent }}_h{{ $number }}">
        <a class="font-w600 {{ isset($icon) ? 'd-flex justify-content-between w-100 accordion-title' : '' }}" data-toggle="collapse" data-parent="#{{ $parent }}" href="#{{ $parent }}_q{{ $number }}" aria-expanded="false" aria-controls="{{ $parent }}_q{{ $number }}">
        	@if(isset($icon))
        		<div>
                    <span class="mr-2"><i class="{{ $icon }}"></i></span> 
                    {{ $title }}
                </div>
                <span class="accordion-collapse-icon"><i class="fa fa-arrow-up"></i></span>
            @else
        		{{ $title }}
        	@endif
    	</a>
    </div>
    <div id="{{ $parent }}_q{{ $number }}" class="collapse {{ $show ?? '' }}" role="tabpanel" aria-labelledby="{{ $parent }}_h{{ $number }}" data-parent="#{{ $parent }}">
        <div class="block-content">
            {{ $slot }}
        </div>
    </div>
</div>
