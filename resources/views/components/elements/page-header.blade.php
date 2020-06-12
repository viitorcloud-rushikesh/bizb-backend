<div {{ $attributes->merge(['class' => 'bg-body-light']) }}>
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{ $title }}</h1>
            @isset($breadcrumbs)
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @php
                        $breadcrumbs = explode(',', $breadcrumbs);
                    @endphp
                    @foreach ($breadcrumbs as $item)
                    <li class="breadcrumb-item">{{ $item }}</li>
                    @endforeach

                    <li class="breadcrumb-item active" aria-current="page">
                        {{ isset($activeBreadcrumb) ? $activeBreadcrumb : $title }}
                    </li>
                </ol>
            </nav>
            @endisset
        </div>
    </div>
</div>