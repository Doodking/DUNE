@section('products')
    <div class="container mt-5">
        @foreach($store as $s)
            @if(count($product) > 0)
                <div class="row row-cols-1 row-cols-md-3 text-center">
                    @foreach($product as $p)
                        <div class="col mb-4">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">{{$p->name}}</h4>
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('storage/pics/' .  $p->pic) }}" width="100" height="100" class="rounded-circle" alt="">
                                    <h5 class="card-title pricing-card-title mt-4">{{$p->price}}$<small class="text-muted">/ mo</small></h5>
                                    <p>{{$p->description}}</p>
                                    <a href="{{'/shop/' . $p->shop_id . '/product/' . $p->id}}"><button type="button" class="btn btn-lg btn-block btn-outline-primary">Click...</button></a>
                                </div>
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
