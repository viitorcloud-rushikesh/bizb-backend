<x-backend.layouts.backend>
    <!-- Hero -->
    <x-backend.elements.page-header title="View users" />
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <x-backend.elements.card is-div is-rounded>
            {{-- <h2 class="content-heading pt-0">Users</h2> --}}
            <livewire:users.users-table />
        </x-backend.elements.card>
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
</x-backend.layouts.backend>
