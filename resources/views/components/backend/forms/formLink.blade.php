<a href="{{ $action }}"
   class="{{ $class }}"
   onclick="event.preventDefault();
                                    document.getElementById('{{ $id }}').submit();">{{ $slot }}</a>
<form id="{{ $id }}" method="POST" action="{{ $action }}" class="hidden">
    {{ csrf_field() }}
</form>
