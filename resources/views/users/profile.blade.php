<x-layouts.backend>
    <x-elements.page-header title="My Profile"/>

    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <x-elements.card is-div is-rounded is-bordered with-header>
            <x-slot name="title">Personal information</x-slot>
            @include('components.layouts.partials.backend.errors')
            <livewire:users.profile-form action="{{route('admin.users.update', ['user' => $user->id])}}" method="PUT" id="frmUserUpdate"/>
        </x-elements.card>
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
</x-layouts.backend>
