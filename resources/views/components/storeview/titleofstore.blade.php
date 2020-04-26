@section('title')
    @foreach($store as $s)
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center border-bottom">
        <img src="{{ asset('storage/images/' . $s->filename ) }}" width="1000px" height="200px" class="card-img-top" alt="What?">
        <h1 class="display-4">{{$s->name}}</h1>
        <p class="lead">{{$s->description}}</p>
        @if(Auth::user()->id == $s->user_id)
            <div class="alert alert-danger mt-3" role="alert" style="text-align: center">
                    @foreach($store as $s)
                        You can fill it, by the way, on <a href="{{'/shopsofuser/shopsofuser/' . Auth::user()->id . '/shop/' . $s->id . '/create'}}" class="alert-link">there</a>.
                    @endforeach
            </div>
        @endif
        @include('components.alerts')
    </div>
    @endforeach
