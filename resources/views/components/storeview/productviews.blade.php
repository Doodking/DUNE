@section('products')
    <div class="container mt-5">
        @foreach($store as $s)
            @if(count($product) > 0)
                <div class="card-deck mb-3 text-center">
                    @foreach($product as $p)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">{{$p->name}}</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">{{$p->price}}$<small class="text-muted">/ mo</small></h1>
                            <p>{{$p->description}}</p>
                            <a href="{{'/shop/' . $p->shop_id . '/product/' . $p->id}}"><button type="button" class="btn btn-lg btn-block btn-outline-primary">Click...</button></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                @if(Auth::user()->id == $s->user_id)
                    <div class="alert alert-danger mt-3" role="alert" style="text-align: center">
                            @foreach($store as $s)
                            Clear list, but you can fill it, by the way, on <a href="{{'/shopsofuser/shopsofuser/' . Auth::user()->id . '/shop/' . $s->id . '/create'}}" class="alert-link">there</a>.
                            @endforeach
                    </div>
                @endif
            @endif
        @endforeach
    </div>
