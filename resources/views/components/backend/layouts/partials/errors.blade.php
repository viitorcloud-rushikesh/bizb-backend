@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-12 error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif