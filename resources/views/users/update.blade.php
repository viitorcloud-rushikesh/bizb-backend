<x-layouts.backend>
    <!-- Hero -->
    <x-elements.page-header title="Update user" />
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <x-elements.card is-div is-rounded is-bordered with-header>
            <x-slot name="title">Personal information</x-slot>
            
            @include('components.layouts.partials.backend.errors')

            <livewire:users.update-form action="{{route('admin.users.update', ['user' => $user->id])}}" method="PUT" id="frmUserEdit" submit-event="submit" submit-text="Save" :user="$user"/>

        </x-elements.card>
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
</x-layouts.backend>
