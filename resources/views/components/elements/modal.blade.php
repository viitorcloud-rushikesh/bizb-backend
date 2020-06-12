@props([
		'id' => 'modal-block',
		'title' => 'Modal Title',
		'closeBtn' => true, 
		'closeBtnText' => 'Close', 
		'doneBtn' => true, 
		'doneBtnText' => 'Done',
		'contentClass' => '',
		'headerClass' => 'bg-primary-dark',
		'footerClass' => 'bg-light',
		'showFooter' => true,
		'showHeader' => true
	])

<div {{ $attributes->merge(['class' => 'modal fade']) }} id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
            	@if($showHeader)
	                <div class="block-header {{$headerClass}}">
	                    <h3 class="block-title">{{ $title }}</h3>
	                    @if($closeBtn)
		                    <div class="block-options">
		                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
		                            <i class="fa fa-fw fa-times"></i>
		                        </button>
		                    </div>
	                    @endif
	                </div>
                @endif
                <div class="block-content {{$contentClass}}">
                    {{$slot}}
                </div>
                @if($showFooter)
	                <div class="block-content block-content-full text-right {{$footerClass}}">
	                	@if($closeBtn)
		                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">
		                    	{!! $closeBtnText !!}
		                	</button>
	                	@endif
	                	@if($doneBtn)
	                    	<button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">
	                    		{!! $doneBtnText !!}
	                    	</button>
	                    @endif
	                </div>
                @endif
            </div>
        </div>
    </div>
</div>