<x-layouts.backend>
    <!-- Hero -->
    <x-elements.page-header title="View users" />
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <x-elements.card is-div is-rounded>
            {{-- <h2 class="content-heading pt-0">Users</h2> --}}
            <livewire:users.users-table />
        </x-elements.card>
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
</x-layouts.backend>
