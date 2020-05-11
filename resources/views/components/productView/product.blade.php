@section('product')
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    {{--<img src="{{ asset('storage/pics/' .  $product->pic) }}" width="100px" height="200px" class="card-img mt-5 rounded-circle" alt="...">--}}
                    <img src="{{ asset('storage/pics/' .  $product->pic) }}" width="150" height="150" class="rounded-circle" style="margin-left: 22px; margin-top: 22px" alt="">
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
        <div class="modal fade" id="mx" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Create your own post, bruh</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('createCommentProduct', [$product->shop_id, $product->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Comment</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Write</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-5" style="text-align: center">
            <h4>Comments</h4>
            <button type="button" class="btn btn-outline-danger my-3" data-toggle="modal" data-target="#mx">
                write comment
            </button>
        </div>
        <div>
            @foreach($comm as $key => $value)
                <div class="alert alert-primary" id="w" role="alert">
                    {{$authors[$key]->name}}:   {{$value->text}}
                </div>
            @endforeach
        </div>
