<x-layouts.backend>
    <!-- Hero -->
    <x-elements.page-header title="Create user" />
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <x-elements.card is-div is-rounded is-bordered with-header>
            <x-slot name="title">Personal information</x-slot>
            
            @include('components.layouts.partials.backend.errors')

            <livewire:users.create-form action="{{route('admin.users.store')}}" method="POST" id="frmCreateUser" submit-event="submit" submit-text="Save"/>

        </x-elements.card>
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
</x-layouts.backend>
