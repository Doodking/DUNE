@section('button')
    <button class="btn btn-primary my-4 " type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Show all shops
    </button>
    <div class="collapse" id="collapseExample">
        @foreach($shops2 as $shop)
            <div class="card mb-3">
                <img src="{{ asset('storage/images/' . $shop->filename ) }}" width="1000px" height="200px" class="card-img-top" alt="...">
                <div class="card-body" style="text-align: center">
                    <h5 class="card-title">{{$shop->name}}</h5>
                    <p class="card-text">{{$shop->name}}</p>
                    <p class="card-text"><small class="text-muted">{{$shop->user_id}}</small></p>
                    <a href="{{'shopsofuser/shopsofuser/' . Auth::user()->id . '/shop/' . $shop->id}}"><button type="button" class="btn btn-outline-danger">Continue...</button></a>
                </div>
            </div>
        @endforeach
    </div>
