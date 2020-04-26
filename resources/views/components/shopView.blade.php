@section('shopView')
    @foreach($shops as $shop)
    <div class="card mb-3">
        <img src="{{ asset('storage/images/' . $shop->filename ) }}" width="1000px" height="200px" class="card-img-top" alt="What?">
        <div class="card-body" style="text-align: center">
            <h5 class="card-title">{{$shop->name}}</h5>
            <p class="card-text">{{$shop->description}}</p>
            <p class="card-text"><small class="text-muted">Master: {{Auth::user()->name}}</small></p>
            <a href="{{'shopsofuser/' . Auth::user()->id . '/shop/' . $shop->id}}"><button type="button" class="btn btn-outline-danger">Continue...</button></a>
        </div>
    </div>
    @endforeach
