<x-layouts.backend>
    @section('css_before')
        <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/dropzone/dist/min/dropzone.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">

        <link rel="stylesheet" href="{{ asset('js/plugins/slick-carousel/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/slick-carousel/slick-theme.css') }}">
    @endsection

    @section('js_after')
        <!-- Page JS Plugins -->
        <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('js/plugins/dropzone/dropzone.min.js') }}"></script>
        <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('js/plugins/slick-carousel/slick.min.js') }}"></script>

        <!-- Page JS Helpers -->
        <script>jQuery(function(){ Dashmix.helpers(['select2', 'flatpickr', 'datepicker', 'colorpicker', 'slick']); });</script>
    @endsection

    <!-- Hero -->
    {{-- <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Elements</h1>
            </div>
        </div>
    </div> --}}
    <x-elements.page-header title="Elements" breadcrumbs="App" />
    
    <!-- END Hero -->

    <!-- Page Content -->
    
        <!-- Info -->
        <div class="content">
        <div class="block block-rounded block-bordered">
             <div class="block-header block-header-default">
                <h3 class="block-title">List</h3>
            </div>
            <div class="block-content py-5">
                <x-elements.accordion.accordion id="elementsList">

                    {{-- Accordion Started --}}
                        <x-elements.accordion.accordionchild number="1" parent="elementsList" show="show" title="Accordion">
                            <h2 class="content-heading">Single Item</h2>
                            <x-elements.accordion.accordion id="accordion">
                                <x-elements.accordion.accordionchild number="accordion1_1" parent="accordion" show="show" title="1.1 Accordion Title">
                                    <p>1.1 Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                </x-elements.accordion.accordionchild>
                                <x-elements.accordion.accordionchild number="accordion1_2" parent="accordion" title="1.2 Accordion Title">
                                    <p>1.2 Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                </x-elements.accordion.accordionchild>
                            </x-elements.accordion.accordion>

                            <h2 class="content-heading">Multiple Items</h2>
                            <x-elements.accordion.accordion id="accordion_multiple">
                                <x-elements.accordion.accordionchild number="accordion2_1" parent="accordion_multiple" show="show" title="2.1 Accordion Title" multiple="true">
                                    <p>2.1 Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                </x-elements.accordion.accordionchild>
                                <x-elements.accordion.accordionchild number="accordion2_2" parent="accordion_multiple" title="2.2 Accordion Title" multiple="true">
                                    <p>2.2 Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                </x-elements.accordion.accordionchild>
                            </x-elements.accordion.accordion>

                            <h2 class="content-heading">WIth icon (multiple items)</h2>

                            <div id="accordion2" role="tablist" aria-multiselectable="true">
                                <div class="block block-rounded mb-1">
                                    <div class="block-header block-header-default" role="tab" id="accordion2_h1">
                                        <a class="font-w600 d-flex justify-content-between w-100 accordion-title" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_q1" aria-expanded="true" aria-controls="accordion2_q1">
                                            <div>
                                                <span class="mr-2"><i class="fa fa-map-marker-alt"></i></span> 
                                                Accordion Title
                                            </div>
                                            <span class="accordion-collapse-icon"><i class="fa fa-arrow-up"></i></span>
                                        </a>
                                    </div>
                                    <div id="accordion2_q1" class="collapse show" role="tabpanel" aria-labelledby="accordion2_h1">
                                        <div class="block-content">
                                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="block block-rounded mb-1">
                                    <div class="block-header block-header-default" role="tab" id="accordion2_h2">
                                        <a class="font-w600 d-flex justify-content-between w-100 accordion-title" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_q2" aria-expanded="true" aria-controls="accordion2_q2">
                                            <div>
                                                <span class="mr-2"><i class="fa fa-map-marker-alt"></i></span> 
                                                Accordion Title
                                            </div>
                                            <span class="accordion-collapse-icon"><i class="fa fa-arrow-up"></i></span>
                                        </a>
                                    </div>
                                    <div id="accordion2_q2" class="collapse show" role="tabpanel" aria-labelledby="accordion2_h2" style="">
                                        <div class="block-content">
                                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-elements.accordion.accordionchild>
                    {{-- Accordion Ended --}}

                    {{-- Alert Started --}}
                        <x-elements.accordion.accordionchild number="2" parent="elementsList" title="Alerts">
                            <h2 class="content-heading">Default</h2>
                            {{-- <x-elements.alert class="alert-primary">
                                <p class="mb-0">This is a primary message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>
                            <x-elements.alert class="alert-success">
                                <p class="mb-0">This is a successful message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>
                            <x-elements.alert class="alert-warning">
                                <p class="mb-0">This is a warning message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>
                            <x-elements.alert class="alert-danger">
                                <p class="mb-0">This is an error message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert> --}}

                            <x-elements.alert class="alert-primary">
                                <p class="mb-0">This is a primary message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>
                            <x-elements.alert class="alert-success">
                                <p class="mb-0">This is a successful message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>
                            <x-elements.alert class="alert-warning">
                                <p class="mb-0">This is a warning message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>
                            <x-elements.alert class="alert-danger">
                                <p class="mb-0">This is an error message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>
                            <x-elements.alert class="alert-dark">
                                <p class="mb-0">This is a dark message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>

                            <h2 class="content-heading">With icons</h2>
                            {{-- <x-elements.alert class="alert-primary" icon>
                                <div class="flex-00-auto">
                                    <i class="fa fa-fw fa-globe"></i>
                                </div>
                                <div class="flex-fill ml-3">
                                    <p class="mb-0">This is a primary message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                                </div>
                            </x-elements.alert> --}}
                            <x-elements.alert class="alert-primary" icon="fa fa-fw fa-globe">
                                <p class="mb-0">This is a primary message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>
                            {{-- <x-elements.alert class="alert-success" icon>
                                <div class="flex-00-auto">
                                    <i class="fa fa-fw fa-check"></i>
                                </div>
                                <div class="flex-fill ml-3">
                                    <p class="mb-0">This is a successful message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                                </div>
                            </x-elements.alert> --}}
                            <x-elements.alert class="alert-success" icon="fa fa-fw fa-check">
                                <p class="mb-0">This is a successful message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>
                            {{-- <x-elements.alert class="alert-warning" icon>
                                <div class="flex-fill mr-3">
                                    <p class="mb-0">This is a warning message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                                </div>
                                <div class="flex-00-auto">
                                    <i class="fa fa-fw fa-exclamation-circle"></i>
                                </div>
                            </x-elements.alert> --}}
                            <x-elements.alert class="alert-warning" icon="fa fa-fw fa-exclamation-circle" append-icon>
                                <p class="mb-0">This is a warning message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>
                            {{-- <x-elements.alert class="alert-danger" icon>
                                <div class="flex-fill mr-3">
                                    <p class="mb-0">This is an error message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                                </div>
                                <div class="flex-00-auto">
                                    <i class="fa fa-fw fa-times-circle"></i>
                                </div>
                            </x-elements.alert> --}}
                            <x-elements.alert class="alert-danger" icon="fa fa-fw fa-times-circle" append-icon>
                                <p class="mb-0">This is an error message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>

                            <h2 class="content-heading">Dismissible</h2>
                            {{-- <x-elements.alert class="alert-danger alert-dismissable" icon dismissable>
                                <div class="flex-fill mr-3">
                                    <p class="mb-0">This is a dismissable error message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                                </div>
                            </x-elements.alert> --}}
                            <x-elements.alert class="alert-danger" dismissable>
                                <p class="mb-0">This is a dismissable error message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>

                            <h2 class="content-heading">With Titles</h2>
                            {{-- <x-elements.alert class="alert-primary">
                                <h3 class="alert-heading font-size-h4 my-2">Primary</h3>
                                <p class="mb-0">This is a primary message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert> --}}
                            <x-elements.alert class="alert-primary">
                                <x-slot name="title">Primary</x-slot>
                                <p class="mb-0">This is a primary message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p>
                            </x-elements.alert>
                        </x-elements.accordion.accordionchild>
                    {{-- Alert Ended --}}

                    {{-- Button Started --}}
                        <x-elements.accordion.accordionchild number="3" parent="elementsList" title="Buttons">
                            <div class="row">
                                <div class="col-md-4">
                                    <h2 class="content-heading">Default</h2>
                                    {{-- <x-elements.button type="button" class="btn-primary">Primary</x-elements.button>
                                    <x-elements.button type="button" class="btn-dark">Dark</x-elements.button> --}}
                                    <x-elements.button class="btn-primary">Primary</x-elements.button>
                                    <x-elements.button class="btn-dark">Dark</x-elements.button>
                                </div>

                                <div class="col-md-4">
                                    <h2 class="content-heading">Outline</h2>
                                    {{-- <x-elements.button type="button" class="btn-outline-primary">Primary</x-elements.button>
                                    <x-elements.button type="button" class="btn-outline-dark">Dark</x-elements.button> --}}
                                    <x-elements.button class="btn-outline-primary">Primary</x-elements.button>
                                    <x-elements.button class="btn-outline-dark">Dark</x-elements.button>
                                </div>

                                <div class="col-md-4">
                                    <h2 class="content-heading">Disabled</h2>
                                    {{-- <x-elements.button type="button" class="btn-primary" disabled="">Primary</x-elements.button>
                                    <x-elements.button type="button" class="btn-dark" disabled="">Dark</x-elements.button> --}}
                                    <x-elements.button class="btn-primary" is-disabled>Primary</x-elements.button>
                                    <x-elements.button class="btn-dark" is-disabled>Dark</x-elements.button>
                                </div>
                            </div>

                            <h2 class="content-heading">With icons</h2>
                            {{-- <x-elements.button type="button" class="btn-primary">
                                <i class="fa fa-fw fa-plus mr-1"></i> Add User
                            </x-elements.button>
                            <x-elements.button type="button" class="btn-dark">
                                <i class="fa fa-fw fa-plus mr-1"></i> Add User
                            </x-elements.button>
                            <x-elements.button type="button" class="btn-outline-primary">
                                <i class="fa fa-fw fa-upload mr-1"></i> Primary
                            </x-elements.button>
                            <x-elements.button type="button" class="btn-outline-dark">
                                <i class="fa fa-fw fa-upload mr-1"></i> Dark
                            </x-elements.button> --}}

                            <x-elements.button class="btn-primary" icon="fa fa-fw fa-plus">
                                Add User
                            </x-elements.button>
                            <x-elements.button class="btn-dark" icon="fa fa-fw fa-plus">
                                Add User
                            </x-elements.button>
                            <x-elements.button class="btn-outline-primary" icon="fa fa-fw fa-upload">
                                Primary
                            </x-elements.button>
                            <x-elements.button class="btn-outline-dark" icon="fa fa-fw fa-upload">
                                Dark
                            </x-elements.button>
                        </x-elements.accordion.accordionchild>
                    {{-- Button Ended --}}

                    {{-- Card Started --}}
                        <x-elements.accordion.accordionchild number="4" parent="elementsList" title="Card">
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- <x-elements.card class="bg-light text-center" isRounded>
                                        <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                            <div>
                                                <i class="far fa-2x fa-user-circle"></i>
                                                <div class="font-w600 mt-3 text-uppercase">Block 1</div>
                                            </div>
                                        </div>
                                    </x-elements.card> --}}
                                    <x-elements.card class="bg-light text-center" is-rounded block-class="block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="far fa-2x fa-user-circle"></i>
                                            <div class="font-w600 mt-3 text-uppercase">Block 1</div>
                                        </div>
                                    </x-elements.card>
                                </div>
                                <div class="col-md-6">
                                    {{-- <x-elements.card class="bg-light text-center">
                                        <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                            <div>
                                                <i class="far fa-2x fa-user-circle"></i>
                                                <div class="font-w600 mt-3 text-uppercase">Block 1</div>
                                            </div>
                                        </div>
                                    </x-elements.card> --}}
                                    <x-elements.card class="bg-light text-center" is-div block-class="block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="far fa-2x fa-user-circle"></i>
                                            <div class="font-w600 mt-3 text-uppercase">Block 1</div>
                                        </div>
                                    </x-elements.card>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {{-- <x-elements.card isRounded>
                                        <div class="block-header block-header-default">
                                            <h3 class="block-title">Title <small>Subtitle</small></h3>
                                        </div>
                                        <div class="block-content">
                                            <p>With header background..</p>
                                        </div>
                                    </x-elements.card> --}}
                                    <x-elements.card is-rounded with-header>
                                        <x-slot name="title">Title</x-slot>
                                        <x-slot name="subtitle">Subtitle</x-slot>
                                        <p>With header background..</p>
                                    </x-elements.card>
                                </div>
                                <div class="col-md-6">
                                    {{-- <x-elements.card>
                                        <div class="block-header block-header-default">
                                            <h3 class="block-title">Title <small>Subtitle</small></h3>
                                        </div>
                                        <div class="block-content">
                                            <p>With header background..</p>
                                        </div>
                                    </x-elements.card> --}}
                                    <x-elements.card with-header is-div>
                                        <x-slot name="title">Title</x-slot>
                                        <x-slot name="subtitle">Subtitle</x-slot>
                                        <p>With header background..</p>
                                    </x-elements.card>
                                </div>
                            </div>
                        </x-elements.accordion.accordionchild>
                    {{-- Card Ended --}}

                    {{-- Modal Started --}}
                        <x-elements.accordion.accordionchild number="5" parent="elementsList" title="Modal">
                            <h2 class="content-heading">Fade In Modal</h2>
                            <x-elements.button type="button" class="btn-primary" data-toggle="modal" data-target="#modal-block-fadein">Open Modal</x-elements.button>

                            <x-elements.modal id="modal-block-fadein">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Modal Title</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                                    </div>
                                    <div class="block-content block-content-full text-right bg-light">
                                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Done</button>
                                    </div>
                                </div>
                            </x-elements.modal>
                        </x-elements.accordion.accordionchild>
                    {{-- Modal Ended --}}

                    {{-- Popover Started --}}
                        <x-elements.accordion.accordionchild number="6" parent="elementsList" title="Popover">
                            <h2 class="content-heading">Default</h2>
                            <div class="row text-center">
                                <div class="col-sm-6 col-xl-3">
                                    <x-elements.popover class="btn-block btn-primary" placement="top" trigger="" animation="" title="Top Popover" description="This is example content. You can put a description or more info here.">
                                        Top
                                    </x-elements.popover>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <x-elements.popover class="btn-block btn-primary" placement="right" trigger="" animation="" title="Right Popover" description="This is example content. You can put a description or more info here.">
                                        Right
                                    </x-elements.popover>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <x-elements.popover class="btn-block btn-primary" placement="bottom" trigger="" animation="" title="Bottom Popover" description="This is example content. You can put a description or more info here.">
                                        Bottom
                                    </x-elements.popover>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <x-elements.popover class="btn-block btn-primary" placement="left"  trigger="" animation="" title="Left Popover" description="This is example content. You can put a description or more info here.">
                                        Left
                                    </x-elements.popover>
                                </div>
                            </div>

                            <h2 class="content-heading">Click Triggered</h2>

                            <div class="row text-center">
                                <div class="col-sm-6 col-xl-3">
                                    <x-elements.popover class="btn-block btn-secondary" placement="top" trigger="click" animation="" title="Top Popover" description="This is example content. You can put a description or more info here.">
                                        Top
                                    </x-elements.popover>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <x-elements.popover class="btn-block btn-secondary" placement="right" trigger="click" animation="" title="Right Popover" description="This is example content. You can put a description or more info here.">
                                        Right
                                    </x-elements.popover>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <x-elements.popover class="btn-block btn-secondary" placement="bottom" trigger="click" animation="" title="Bottom Popover" description="This is example content. You can put a description or more info here.">
                                        Bottom
                                    </x-elements.popover>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <x-elements.popover class="btn-block btn-secondary" placement="left"  trigger="click" animation="" title="Left Popover" description="This is example content. You can put a description or more info here.">
                                        Left
                                    </x-elements.popover>
                                </div>
                            </div>

                            <h2 class="content-heading">Animation</h2>

                            <div class="row text-center">
                                <div class="col-sm-6 col-xl-3">
                                    <x-elements.popover class="btn-block btn-secondary" placement="top" trigger="" animation="true" title="Top Popover" description="This is example content. You can put a description or more info here.">
                                        Top
                                    </x-elements.popover>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <x-elements.popover class="btn-block btn-secondary" placement="right" trigger="" animation="true" title="Right Popover" description="This is example content. You can put a description or more info here.">
                                        Right
                                    </x-elements.popover>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <x-elements.popover class="btn-block btn-secondary" placement="bottom" trigger="" animation="true" title="Bottom Popover" description="This is example content. You can put a description or more info here.">
                                        Bottom
                                    </x-elements.popover>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <x-elements.popover class="btn-block btn-secondary" placement="left"  trigger="" animation="true" title="Left Popover" description="This is example content. You can put a description or more info here.">
                                        Left
                                    </x-elements.popover>
                                </div>
                            </div>
                        </x-elements.accordion.accordionchild>
                    {{-- Popover Ended --}}

                    {{-- Form Elements Started --}}
                        <x-elements.accordion.accordionchild number="7" parent="elementsList" title="Form Elements">
                            <div class="form-group">
                                <x-elements.label for="example-text-input">Textbox</x-elements.label>
                                {{-- <x-elements.textbox type="text" id="example-text-input" name="example-text-input" placeholder="Text Input"></x-elements.textbox> --}}

                                <x-elements.textbox type="text" name="name" id="name" placeholder="Enter your Name" labelClass="bg-body-light" inputClass="bg-white" readonly>Name:</x-elements.textbox>

                                <x-elements.textbox type="email" name="email" id="email" placeholder="Enter Email" labelClass="text-uppercase">Email:</x-elements.textbox>

                                <x-elements.textbox type="password" name="password" id="password" placeholder="Enter Password" inputClass="bg-white" disabled>Password:</x-elements.textbox>

                            </div>

                            <div class="form-group">
                                <x-elements.label for="example-textarea-input">Textarea</x-elements.label>
                                {{-- <x-elements.textarea id="example-textarea-input" name="example-textarea-input" rows="4" placeholder="Textarea content.."></x-elements.textarea> --}}
                            
                                <x-elements.textarea id="example-textarea-input" name="example-textarea-input" rows="4" placeholder="Textarea content.." inputClass="text-left" readonly></x-elements.textarea>

                                <x-elements.textarea id="example-textarea-input" name="example-textarea-input" rows="4" placeholder="Textarea content.." inputClass="text-left"></x-elements.textarea>
                            </div>

                            <div class="form-group">
                                <x-elements.label for="">Custom File Input</x-elements.label>
                                <div class="custom-file">
                                    <x-elements.fileinput id="example-file-input-custom" name="example-file-input-custom" dataToggle="custom-file-input"></x-elements.fileinput>
                                    <x-elements.label class="custom-file-label" for="example-file-input-custom">Choose file</x-elements.label>
                                </div>
                            </div>

                            <h2 class="content-heading">Input Group</h2>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-elements.label for="">Prepend</x-elements.label>

                                        <x-elements.inputgroup.inputgroup is-prepend type="text" id="example-group1-input1" name="example-group1-input1">
                                            <x-slot name="prependItem">
                                                <span class="input-group-text">Name</span>
                                            </x-slot>
                                        </x-elements.inputgroup.inputgroup>

                                        {{-- <x-elements.inputgroup.inputgroup>
                                            <x-elements.inputgroup.inputgroup_prepend>
                                                <span class="input-group-text">Name</span>
                                            </x-elements.inputgroup.inputgroup_prepend>
                                            <x-elements.textbox type="text" id="example-group1-input1" name="example-group1-input1" placeholder=""></x-elements.textbox>
                                        </x-elements.inputgroup.inputgroup> --}}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-elements.label for="">Append</x-elements.label>

                                        <x-elements.inputgroup.inputgroup is-append type="text" id="example-group1-input2" name="example-group1-input2">
                                            <x-slot name="appendItem">
                                                <span class="input-group-text">Name</span>
                                            </x-slot>
                                        </x-elements.inputgroup.inputgroup>

                                        {{-- <x-elements.inputgroup.inputgroup>
                                            <x-elements.textbox type="text" id="example-group1-input2" name="example-group1-input2" placeholder=""></x-elements.textbox>
                                            <x-elements.inputgroup.inputgroup_append>
                                                <span class="input-group-text">Name</span>
                                            </x-elements.inputgroup.inputgroup_append>
                                        </x-elements.inputgroup.inputgroup> --}}
                                    </div>
                                </div>
                            </div>

                            <h2 class="content-heading">Input Group With Icons</h2>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <x-elements.label for="">Prepend</x-elements.label>

                                        <x-elements.inputgroup.inputgroup is-prepend type="text" id="example-group2-input1" name="example-group2-input1">
                                            <x-slot name="prependItem">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </x-slot>
                                        </x-elements.inputgroup.inputgroup>

                                        {{-- <x-elements.inputgroup.inputgroup>
                                            <x-elements.inputgroup.inputgroup_prepend>
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </x-elements.inputgroup.inputgroup_prepend>
                                            <x-elements.textbox type="text" id="example-group2-input1" name="example-group2-input1" placeholder=""></x-elements.textbox>
                                        </x-elements.inputgroup.inputgroup> --}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <x-elements.label for="">Append</x-elements.label>

                                        <x-elements.inputgroup.inputgroup is-append type="text" id="example-group2-input2" name="example-group2-input2">
                                            <x-slot name="appendItem">
                                                <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                            </x-slot>
                                        </x-elements.inputgroup.inputgroup>

                                        {{-- <x-elements.inputgroup.inputgroup>
                                            <x-elements.textbox type="text" id="example-group2-input2" name="example-group2-input2" placeholder=""></x-elements.textbox>
                                            <x-elements.inputgroup.inputgroup_append>
                                                <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                            </x-elements.inputgroup.inputgroup_append>
                                        </x-elements.inputgroup.inputgroup> --}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <x-elements.label for="">With Button</x-elements.label>

                                        <x-elements.inputgroup.inputgroup is-append type="text" id="example-group3-input1" name="example-group3-input1">
                                            <x-slot name="appendItem">
                                                <x-elements.button type="button" class="btn-primary">Submit</x-elements.button>
                                            </x-slot>
                                        </x-elements.inputgroup.inputgroup>

                                        {{-- <x-elements.inputgroup.inputgroup>
                                            <x-elements.textbox type="text" id="example-group3-input1" name="example-group3-input1" placeholder=""></x-elements.textbox>
                                            <x-elements.inputgroup.inputgroup_append>
                                                <x-elements.button type="button" class="btn-primary">Submit</x-elements.button>
                                            </x-elements.inputgroup.inputgroup_append>
                                        </x-elements.inputgroup.inputgroup> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="content-heading">Custom checkboxes</h2>
                                    <div class="form-group">
                                        {{-- <x-elements.checkbox.checkboxwrapper>
                                            <x-elements.checkbox.checkboxfield id="example-checkbox-custom1" name="example-checkbox-custom1" checked=""></x-elements.checkbox.checkboxfield>
                                            <x-elements.label class="custom-control-label" for="example-checkbox-custom1">Option 1</x-elements.label>
                                        </x-elements.checkbox.checkboxwrapper>

                                        <x-elements.checkbox.checkboxwrapper>
                                            <x-elements.checkbox.checkboxfield id="example-checkbox-custom2" name="example-checkbox-custom2"></x-elements.checkbox.checkboxfield>
                                            <x-elements.label class="custom-control-label" for="example-checkbox-custom2">Option 2</x-elements.label>
                                        </x-elements.checkbox.checkboxwrapper>

                                        <x-elements.checkbox.checkboxwrapper>
                                            <x-elements.checkbox.checkboxfield id="example-checkbox-custom3" name="example-checkbox-custom3"></x-elements.checkbox.checkboxfield>
                                            <x-elements.label class="custom-control-label" for="example-checkbox-custom3">Option 3</x-elements.label>
                                        </x-elements.checkbox.checkboxwrapper> --}}

                                        <x-elements.checkbox class="custom-control-primary" id="example-checkbox-custom1" name="example-checkbox-custom1" checked>Option1</x-elements.checkbox>

                                        <x-elements.checkbox class="custom-control-primary" id="example-checkbox-custom2" name="example-checkbox-custom2">Option2</x-elements.checkbox>

                                        <x-elements.checkbox class="custom-control-primary" id="example-checkbox-custom3" name="example-checkbox-custom3">Option3</x-elements.checkbox>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h2 class="content-heading">Inline checkboxes</h2>
                                    <div class="form-group">
                                        {{-- <x-elements.checkbox.checkboxwrapper isInline>
                                            <x-elements.checkbox.checkboxfield id="example-checkbox-custom-inline1" name="example-checkbox-custom-inline1" checked=""></x-elements.checkbox.checkboxfield>
                                            <x-elements.label class="custom-control-label" for="example-checkbox-custom-inline1">Option 1</x-elements.label>
                                        </x-elements.checkbox.checkboxwrapper>

                                        <x-elements.checkbox.checkboxwrapper isInline>
                                            <x-elements.checkbox.checkboxfield id="example-checkbox-custom-inline2" name="example-checkbox-custom-inline2"></x-elements.checkbox.checkboxfield>
                                            <x-elements.label class="custom-control-label" for="example-checkbox-custom-inline2">Option 2</x-elements.label>
                                        </x-elements.checkbox.checkboxwrapper>

                                        <x-elements.checkbox.checkboxwrapper isInline>
                                            <x-elements.checkbox.checkboxfield id="example-checkbox-custom-inline3" name="example-checkbox-custom-inline3"></x-elements.checkbox.checkboxfield>
                                            <x-elements.label class="custom-control-label" for="example-checkbox-custom-inline3">Option 3</x-elements.label>
                                        </x-elements.checkbox.checkboxwrapper> --}}

                                        <x-elements.checkbox class="custom-control-primary" id="example-checkbox-custom4" name="example-checkbox-custom4" checked inline>Option1</x-elements.checkbox>

                                        <x-elements.checkbox class="custom-control-primary" id="example-checkbox-custom5" name="example-checkbox-custom5" inline>Option2</x-elements.checkbox>

                                        <x-elements.checkbox class="custom-control-primary" id="example-checkbox-custom6" name="example-checkbox-custom6" inline>Option3</x-elements.checkbox>
                                    </div>  
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="content-heading">Custom radios</h2>
                                    <div class="form-group">
                                        {{-- <x-elements.radio.radiowrapper>
                                            <x-elements.radio.radiofield id="example-radio-custom1" name="example-radio-custom" checked=""></x-elements.radio.radiofield>
                                            <x-elements.label class="custom-control-label" for="example-radio-custom1">Option 1</x-elements.label>
                                        </x-elements.radio.radiowrapper>

                                        <x-elements.radio.radiowrapper>
                                            <x-elements.radio.radiofield id="example-radio-custom2" name="example-radio-custom"></x-elements.radio.radiofield>
                                            <x-elements.label class="custom-control-label" for="example-radio-custom2">Option 2</x-elements.label>
                                        </x-elements.radio.radiowrapper>

                                        <x-elements.radio.radiowrapper>
                                            <x-elements.radio.radiofield id="example-radio-custom3" name="example-radio-custom"></x-elements.radio.radiofield>
                                            <x-elements.label class="custom-control-label" for="example-radio-custom3">Option 3</x-elements.label>
                                        </x-elements.radio.radiowrapper> --}}
                                        <x-elements.radio  class="custom-control-primary" id="example-radio-custom1" name="example-radio-custom" checked>Option1</x-elements.radio>

                                        <x-elements.radio class="custom-control-primary" id="example-radio-custom2" name="example-radio-custom">Option2</x-elements.radio>

                                        <x-elements.radio class="custom-control-primary" id="example-radio-custom3" name="example-radio-custom">Option3</x-elements.radio>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h2 class="content-heading">Inline radios</h2>
                                    <div class="form-group">
                                        {{-- <x-elements.radio.radiowrapper isInline>
                                            <x-elements.radio.radiofield class="custom-control-primary" id="example-radio-custom-inline1" name="example-radio-custom-inline" checked=""></x-elements.radio.radiofield>
                                            <x-elements.label class="custom-control-label" for="example-radio-custom-inline1">Option 1</x-elements.label>
                                        </x-elements.radio.radiowrapper>

                                        <x-elements.radio.radiowrapper isInline>
                                            <x-elements.radio.radiofield class="custom-control-primary" id="example-radio-custom-inline2" name="example-radio-custom-inline"></x-elements.radio.radiofield>
                                            <x-elements.label class="custom-control-label" for="example-radio-custom-inline2">Option 2</x-elements.label>
                                        </x-elements.radio.radiowrapper>

                                        <x-elements.radio.radiowrapper isInline>
                                            <x-elements.radio.radiofield class="custom-control-primary" id="example-radio-custom-inline3" name="example-radio-custom-inline"></x-elements.radio.radiofield>
                                            <x-elements.label class="custom-control-label" for="example-radio-custom-inline3">Option 3</x-elements.label>
                                        </x-elements.radio.radiowrapper> --}}
                                        <x-elements.radio class="custom-control-primary" id="example-radio-custom4" name="example-radio-custom" checked inline>Option4</x-elements.radio>

                                        <x-elements.radio class="custom-control-primary" id="example-radio-custom5" name="example-radio-custom" inline>Option5</x-elements.radio>

                                        <x-elements.radio class="custom-control-primary" id="example-radio-custom6" name="example-radio-custom" inline>Option6</x-elements.radio>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="content-heading">Custom switch</h2>
                                    <div class="form-group">
                                        {{-- <x-elements.switch.switchwrapper class="mb-1">
                                            <x-elements.checkbox.checkboxfield id="example-sw-custom1" name="example-sw-custom1" checked=""></x-elements.checkbox.checkboxfield>
                                            <x-elements.label class="custom-control-label" for="example-sw-custom1">Option 1</x-elements.label>
                                        </x-elements.switch.switchwrapper>

                                        <x-elements.switch.switchwrapper class="mb-1">
                                            <x-elements.checkbox.checkboxfield id="example-sw-custom2" name="example-sw-custom2"></x-elements.checkbox.checkboxfield>
                                            <x-elements.label class="custom-control-label" for="example-sw-custom2">Option 2</x-elements.label>
                                        </x-elements.switch.switchwrapper>

                                        <x-elements.switch.switchwrapper>
                                            <x-elements.checkbox.checkboxfield id="example-sw-custom3" name="example-sw-custom3"></x-elements.checkbox.checkboxfield>
                                            <x-elements.label class="custom-control-label" for="example-sw-custom3">Option 1</x-elements.label>
                                        </x-elements.switch.switchwrapper> --}}

                                        <x-elements.toggle-switch class="custom-control-primary" id="example-switch-custom1" name="example-switch-custom1" checked>Option1</x-elements.toggle-switch>

                                        <x-elements.toggle-switch class="custom-control-primary" id="example-switch-custom2" name="example-switch-custom2">Option2</x-elements.toggle-switch>

                                        <x-elements.toggle-switch class="custom-control-primary" id="example-switch-custom3" name="example-switch-custom3">Option3</x-elements.toggle-switch> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h2 class="content-heading">Inline Switch</h2>
                                    <div class="form-group">
                                        {{-- <x-elements.switch.switcwrapper class="mb-1" isInline>
                                            <x-elements.checkbox.checkboxfield id="example-sw-custom-inline1" name="example-sw-custom-inline1" checked=""></x-elements.checkbox.checkboxfield>
                                            <x-elements.label class="custom-control-label" for="example-sw-custom-inline1">Option 1</x-elements.label>
                                        </x-elements.switch.switchwrapper>

                                        <x-elements.switch.switchwrapper class="mb-1" isInline>
                                            <x-elements.checkbox.checkboxfield id="example-sw-custom-inline2" name="example-sw-custom-inline2"></x-elements.checkbox.checkboxfield>
                                            <x-elements.label class="custom-control-label" for="example-sw-custom-inline2">Option 2</x-elements.label>
                                        </x-elements.switch.switchwrapper>

                                        <x-elements.switch.switchwrapper isInline>
                                            <x-elements.checkbox.checkboxfield id="example-sw-custom-inline3" name="example-sw-custom-inline3"></x-elements.checkbox.checkboxfield>
                                            <x-elements.label class="custom-control-label" for="example-sw-custom-inline3">Option 1</x-elements.label>
                                        </x-elements.switch.switchwrapper> --}}

                                        <x-elements.toggle-switch class="custom-control-primary" id="example-switch-custom4" name="example-switch-custom4" inline checked>Option1</x-elements.toggle-switch>

                                        <x-elements.toggle-switch class="custom-control-primary" id="example-switch-custom5" name="example-switch-custom5" inline>Option2</x-elements.toggle-switch>

                                        <x-elements.toggle-switch class="custom-control-primary" id="example-switch-custom6" name="example-switch-custom6" inline>Option3</x-elements.toggle-switch>
                                    </div>
                                </div>
                            </div>
                        </x-elements.accordion.accordionchild>
                    {{-- Form Elements Ended --}}

                    {{-- Form Layout Started --}}
                        <x-elements.accordion.accordionchild number="8" parent="elementsList" title="Form Layout">
                            <h2 class="content-heading">Vertical</h2>
                            
                            <x-elements.form action="" method="POST">
                                <div class="form-group">
                                    <x-elements.label for="example-ltf-email">Email</x-elements.label>
                                    <x-elements.textbox type="email" id="example-ltf-email" name="example-ltf-email" placeholder="Email"></x-elements.textbox>
                                </div>

                                <div class="form-group">
                                    <x-elements.label for="example-ltf-password">Password</x-elements.label>
                                    <x-elements.textbox type="password" id="example-ltf-password" name="example-ltf-password" placeholder="Password"></x-elements.textbox>
                                </div>

                                <div class="form-group">
                                    <x-elements.button type="submit" class="btn-primary">Login</x-elements.button>
                                </div>
                            </x-elements.form>
                        </x-elements.accordion.accordionchild>
                    {{-- Form Layout Ended --}}

                    {{-- Select2 Started --}}
                        <x-elements.accordion.accordionchild number="9" parent="elementsList" title="Select2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-elements.label for="">Normal Select 2</x-elements.label>
                                        <x-elements.selectbox.selectbox id="example-select2" name="example-select2" placeholder="Choose one..">
                                            <x-elements.selectbox.option value=""></x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="1">HTML</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="2">CSS</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="3">JavaScript</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="4">PHP</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="5">MySQL</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="6">Ruby</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="7">Angular</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="8">React</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="9">Vue.js</x-elements.selectbox.option>
                                        </x-elements.selectbox.selectbox>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-elements.label for="example-select2-multiple">Custom Multiple Select</x-elements.label>
                                        <x-elements.selectbox.selectbox id="example-select2-multiple" name="example-select2-multiple" placeholder="Choose many.." multiple>
                                            <x-elements.selectbox.option value=""></x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="1" selected>HTML</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="2" selected>CSS</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="3">JavaScript</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="4">PHP</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="5">MySQL</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="6">Ruby</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="7">Angular</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="8">React</x-elements.selectbox.option>
                                            <x-elements.selectbox.option value="9">Vue.js</x-elements.selectbox.option>
                                        </x-elements.selectbox.selectbox>
                                    </div>
                                </div>
                            </div>
                        </x-elements.accordion.accordionchild>
                    {{-- Select2 Ended --}}

                    {{-- Dropzone Started --}}
                        <x-elements.accordion.accordionchild number="10" parent="elementsList" title="Dropzone">
                            <x-elements.form class="dropzone" action="/" method=""></x-elements.form>
                        </x-elements.accordion.accordionchild>
                    {{-- Dropzone Ended --}}

                    {{-- Pagination Started --}}
                        <x-elements.accordion.accordionchild number="11" parent="elementsList" title="Pagination">
                            <x-elements.pagination>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <i class="fa fa-angle-double-left"></i>
                                        </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="javascript:void(0)">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)">2</a>
                                </li>
                                <li class="page-item disabled">
                                    <a class="page-link" href="javascript:void(0)">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                        <span aria-hidden="true">
                                            <i class="fa fa-angle-double-right"></i>
                                        </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </x-elements.pagination>
                        </x-elements.accordion.accordionchild>
                    {{-- Pagination Ended --}}

                    {{-- Colorpicker Started --}}
                        <x-elements.accordion.accordionchild number="12" parent="elementsList" title="Colorpicker">
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <x-elements.label for="example-colorpicker2">Hex</x-elements.label>
                                        <x-elements.colorpicker id="example-colorpicker2" name="example-colorpicker2" format="hex" value="#0665d0" input-class="form-control" is-component>
                                        </x-elements.colorpicker>
                                        {{-- <x-elements.inputgroup.inputgroup class="js-colorpicker" data-format="hex">
                                            <x-elements.textbox type="text" id="example-colorpicker2" name="example-colorpicker2" value="#0665d0" placeholder=""></x-elements.textbox>
                                            <x-elements.inputgroup.inputgroup_append>
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </x-elements.inputgroup.inputgroup_append>
                                        </x-elements.inputgroup.inputgroup> --}}
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <x-elements.label for="example-colorpicker4">RGBa Format</x-elements.label>

                                        <x-elements.colorpicker id="example-colorpicker4" name="example-colorpicker4" format="rgba" value="rgba(6, 101, 208, 1)" input-class="form-control" is-component>
                                        </x-elements.colorpicker>

                                        {{-- <x-elements.inputgroup.inputgroup class="js-colorpicker" data-format="rgba">
                                            <x-elements.textbox type="text" id="example-colorpicker4" name="example-colorpicker4" value="rgba(6, 101, 208, 1)" placeholder=""></x-elements.textbox>
                                            <x-elements.inputgroup.inputgroup_append>
                                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </x-elements.inputgroup.inputgroup_append>
                                        </x-elements.inputgroup.inputgroup> --}}
                                    </div>
                                </div>
                            </div>

                            <h2 class="content-heading">Inline</h2>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <x-elements.label for="">Normal</x-elements.label>
                                        <x-elements.colorpicker id="color-container" format="hex" value="rgba(6, 101, 208, 1)" is-inline>
                                        </x-elements.colorpicker>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <x-elements.label for="">With Transparency</x-elements.label>
                                        <x-elements.colorpicker id="color-container2" format="rgba" value="rgba(6, 101, 208, 1)" is-inline>
                                        </x-elements.colorpicker>
                                    </div>
                                </div>
                            </div>

                        </x-elements.accordion.accordionchild>
                    {{-- Colorpicker Ended --}}

                    {{-- Bootstrap Datepicker Started --}}
                        <x-elements.accordion.accordionchild number="14" parent="elementsList" title="Bootstrap Datepicker">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <x-elements.label for="example-datepicker1">Default format</x-elements.label>

                                        <x-elements.textbox type="text" class="js-datepicker bg-white" id="example-datepicker1" name="example-datepicker1" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="mm/dd/yy" placeholder="mm/dd/yy"></x-elements.textbox>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <x-elements.label for="example-datepicker2">Custom format</x-elements.label>

                                        <x-elements.textbox type="text" class="js-datepicker bg-white" id="example-datepicker2" name="example-datepicker2" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd/mm/yy" placeholder="dd/mm/yy"></x-elements.textbox>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <x-elements.label for="example-datepicker3">Friendly format</x-elements.label>

                                        <x-elements.textbox type="text" class="js-datepicker bg-white" id="example-datepicker3" name="example-datepicker3" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"></x-elements.textbox>
                                    </div>
                                </div>
                            </div>
                        </x-elements.accordion.accordionchild>
                    {{-- Bootstrap Datepicker Ended --}}

                    {{-- Slick Slider Started --}}
                        <x-elements.accordion.accordionchild number="15" parent="elementsList" title="Slick Slider">
                            <div class="row">
                                <div class="col-lg-6">
                                    <x-elements.slick dots="true" slides="2" arrow="true">
                                        <div>
                                            <img class="img-fluid" src="{{ asset('media/photos/photo2.jpg')}}" alt="photo">
                                        </div>
                                        <div>
                                            <img class="img-fluid" src="{{ asset('media/photos/photo3.jpg')}}" alt="photo">
                                        </div>
                                        <div>
                                            <img class="img-fluid" src="{{ asset('media/photos/photo4.jpg')}}" alt="photo">
                                        </div>
                                    </x-elements.slick>
                                </div>
                            </div>
                        </x-elements.accordion.accordionchild>
                    {{-- Slick Slider Ended --}}

                    {{-- Tabs Started --}}
                        <x-elements.accordion.accordionchild number="16" parent="elementsList" title="{{ __('Tabs') }}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <x-elements.tab.linkswrapper>
                                        <x-elements.tab.link isActive="true" href="#btabs-alt-static-home">{{ __('Tab 1') }}</x-elements.tab.link>

                                        <x-elements.tab.link href="#btabs-alt-static-profile">{{ __('Tab 2') }}</x-elements.tab.link>

                                        <x-elements.tab.link href="#btabs-alt-static-settings">{{ __('Tab 3') }}</x-elements.tab.link>
                                    </x-elements.tab.linkswrapper>

                                    <x-elements.tab.contentwrapper>
                                        <x-elements.tab.content class="active" id="btabs-alt-static-home">Tab 1 Content</x-elements.tab.content>

                                        <x-elements.tab.content id="btabs-alt-static-profile">Tab 2 Content</x-elements.tab.content>

                                        <x-elements.tab.content id="btabs-alt-static-settings">Tab 3 Content</x-elements.tab.content>
                                    </x-elements.tab.contentwrapper>
                                </div>
                            </div>
                        </x-elements.accordion.accordionchild>
                    {{-- Tabs Ended --}}
                </x-elements.accordion.accordion>
            </div>
        </div>
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
</x-layouts.backend>
