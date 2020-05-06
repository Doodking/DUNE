@section('cart')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Cart of {{strtoupper(Auth::user()->name)}}</h1>
        <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
    </div>
    <div class="container">
        <div class="card-columns mb-3 text-center">
            @foreach($cart as $product)
                @foreach($product as $p)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">{{$p->name}}</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">{{$p->price}}$</h1>
                            <h4>
                                {{$p->description}}
                            </h4>
                            <form action="{{ route('deleteFromCart', $p->id)}}" method="delete">
                                <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Delete from cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
    @if(count($cart) > 0)
        <div>
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" href="/buy/">BUY</a>
                </li>
            </ul>
        </div>
    @else
        <div class="alert alert-warning mt-3" role="alert" style="text-align: center">
            Your cart is empty :( Check out our <a href="/shops">market</a> and fill it
        </div>
    @endif

