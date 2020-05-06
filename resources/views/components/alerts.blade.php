@if($errors->any())
    <div class="alert alert-warning my-3" role="alert" style="text-align: center">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success" role="alert" style="text-align: center">
        {{ session('success') }}
    </div>
@endif
