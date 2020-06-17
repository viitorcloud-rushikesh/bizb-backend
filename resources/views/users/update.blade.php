<x-backend.layouts.backend>
    <!-- Hero -->
    <x-backend.elements.page-header title="Update user" />
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <x-backend.elements.card is-div is-rounded is-bordered with-header>
            <x-slot name="title">Personal information</x-slot>

            @include('components.backend.layouts.partials.errors')

            <livewire:users.update-form action="{{route('backend.users.update', ['user' => $user->id])}}" method="PUT" id="frmUserEdit" submit-event="submit" submit-text="Save" :user="$user"/>

        </x-backend.elements.card>
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
</x-backend.layouts.backend>
