<x-layouts.backend>
    <!-- Hero -->
    <x-elements.page-header title="Users" breadcrumbs="App" />
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <x-elements.card is-div is-rounded is-bordered with-header>
            <x-slot name="title">Users</x-slot>
            <livewire:users-table/>
        </x-elements.card>
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
</x-layouts.backend>
