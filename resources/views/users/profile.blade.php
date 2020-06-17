<x-backend.layouts.backend>
    <x-backend.elements.page-header title="My Profile"/>

    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <x-backend.elements.card is-div is-rounded is-bordered with-header>
            <x-slot name="title">Personal information</x-slot>
            @include('components.backend.layouts.partials.errors')
            <livewire:users.profile-form action="{{route('backend.users.update', ['user' => $user->id])}}" method="PUT" id="frmUserUpdate"/>
        </x-backend.elements.card>
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
</x-backend.layouts.backend>
