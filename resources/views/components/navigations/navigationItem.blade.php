{{-- #TODO create startsWith helper --}}
@can($name)
    <li class="nav-main-item">
        <a class="nav-main-link {{ active($name) }} " href="{{ $href }}">
            {{ $slot }}
        </a>
    </li>
@endcan

{{--Example Usage--}}
{{--<x-navigationItem :href="route('mailcoach.emailLists.subscribers', $emailList)">--}}
{{--    blank--}}
{{--</x-navigationItem>--}}
