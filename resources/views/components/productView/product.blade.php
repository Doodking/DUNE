@section('product')
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="..." class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <p class="card-text"><small class="text-muted">Seller -> {{$user->name}}</small></p>
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#staticBackdrop">+ TO MY CART</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">BUYING</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="{{ route('addToCart', $product->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary" >Only add to my cart</button>
                        </form>
                        <a href="{{'/' . 'product/' . $product->id . '/buy'}}"><button type="button" class="btn btn-primary">Add to my cart</button></a>
                    </div>
                </div>
            </div>
        </div>
