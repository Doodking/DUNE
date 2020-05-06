@section('post')
    <div>
        {{--<div class="card">
            <div class="card-body" style="text-align: center">
                <h3 class="card-title">{{$post->title}}</h3>
                <h5 class="card-text">{{$post->text}}</h5><br>
                <strong class="card-text"><small class="text-muted">{{$post->created_at}}</small></strong>
            </div>
            <img src="https://probootblack.info/wp-content/uploads/2017/09/CAMEL.png" class="card-img-top" alt="...">
        </div>--}}
        <main role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-3">{{$post->title}}</h1>
                    <p>{{$post->text}}</p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
                </div>
            </div>
            <div class="container">
                <!-- Example row of columns -->
                <div class="mb-5 border-bottom" style="text-align: center">
                    <h4>/similar posts in this category/</h4>
                </div>
                <div class="row">
                    @foreach($posta as $po)
                        <div class="col-md-4">
                            <h2>{{$po->title}}</h2>
                            <p>{{substr($po->text, 0, 10)}}...</p>
                            <p><a class="btn btn-secondary" href="{{'/forum/post/' . $po->id}}" role="button">View details »</a></p>
                        </div>
                    @endforeach
                </div>

                <hr>
                <div>
                    <div class="modal fade" id="m" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Create your own post, bruh</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('createComment', $post->id)}}" method="post">
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
                    @include('components.alerts')
                    <div class="my-5" style="text-align: center">
                        <h4>Comments</h4>
                        <button type="button" class="btn btn-outline-danger my-3" data-toggle="modal" data-target="#m">
                            write comment
                        </button>
                    </div>
                    <div>
                        @foreach($comm as $c)
                            <div class="alert alert-primary" id="w" role="alert">
                                {{Auth::user()->name}}/@/{{$c->text}}
                            </div>
                        @endforeach
                    </div>
                </div>

            </div> <!-- /container -->

        </main>

    </div>
