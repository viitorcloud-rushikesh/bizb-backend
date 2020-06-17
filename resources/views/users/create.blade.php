<x-backend.layouts.backend>
    <!-- Hero -->
    <x-backend.elements.page-header title="Create user" />
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <x-backend.elements.card is-div is-rounded is-bordered with-header>
            <x-slot name="title">Personal information</x-slot>

            @include('components.backend.layouts.partials.errors')

            <livewire:users.create-form action="{{route('backend.users.store')}}" method="POST" id="frmCreateUser" submit-event="submit" submit-text="Save"/>

        </x-backend.elements.card>
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
</x-backend.layouts.backend>
