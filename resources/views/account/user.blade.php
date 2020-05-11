@section('account')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-2 order-md-2 mb-4 mt-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" href="/forum">Dashboard</a>
                    <a class="nav-link" href="/friends">
                        Friends
                        <span class="badge badge-pill bg-light align-text-bottom">
                            @php
                                use App\Sub;
                                use Illuminate\Support\Facades\Auth;

                                $s = Sub::where('user_id', Auth::user()->id)->get();
                                $ids = [];
                                foreach ($s as $subsc):
                                    $ids[] = $subsc->sub_id;
                                endforeach;
                                $subs = [];
                                foreach ($ids as $i):
                                    $subs[] = User::find($i);
                                endforeach; echo count($subs);
                            @endphp
                        </span>
                    </a>
                    <a class="nav-link" href="/account/search">Search other users</a>
                    <a class="nav-link" href="/cart/{{Auth::user()->id}}">Your cart</a>
                    <a class="nav-link" href="/shops">Market</a>
                    <a class="nav-link" href="/shopsofuser/{{Auth::user()->id}}">Shops</a>
                    <a class="nav-link" href="#">Your posts</a>
                    <a class="nav-link" href="/account/subs">Your subscribers</a>
                    <a class="nav-link" href="/account/subscr">Your subscriptions</a>
                    <a class="nav-link" href="/account/chat">Chats</a>
                </div>
            </div>
            <div class="col-md-10 order-md-1">
                <div class="d-flex align-items-center p-3 my-3 text-black-50 bg-purple rounded shadow-sm">
                    @if(count($avatar) > 0)
                        @foreach($avatar as $a)
                            <img src="{{ asset('storage/avatars/' .  $a->avatar) }}" width="50" height="50" class="mr-3 rounded-circle" alt="What?">
                        @endforeach
                    @else
                        <img class="mr-3" src="https://cdn.onlinewebfonts.com/svg/img_314890.png" alt="" width="48" height="48">
                    @endif
                    <div class="lh-100">
                        <h6 class="mb-0 text-black lh-100">{{$user->name}}</h6>
                        <p>{{$user->email}}</p>
                        <small>{{$user->created_at}}</small><br>
                        <a href="/account/chat"><i class="fa fa-comments-o" aria-hidden="true"></i></a><br>
                        @if(count($sub) == 0)
                            <form action="{{route('sub', $user->id)}}" method=post>
                                @csrf
                                <button class="btn btn-light btn-sm mt-3" type="submit">FOLLOW <i class="fa fa-plus" aria-hidden="true"></i></button>
                            </form>
                        @else
                            <form action="{{route('unsub', $user->id)}}" method=post>
                                @csrf
                                <button class="btn btn-light btn-sm mt-3" type="submit">UNFOLLOW <i class="fa fa-minus" aria-hidden="true"></i></button>
                            </form>
                        @endif
                    </div>
                </div>
                @include('components.alerts')
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">@posts</h6>
                    @if(count($posts) > 0)
                    @foreach($posts as $p)
                        <div class="media text-muted pt-3">
                            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"></rect><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>
                            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <strong class="d-block text-gray-dark">@ {{$user->name}}</strong>
                                {{$p->text}}
                            </p>
                            <a href="{{'/forum/post/' . $p->id}}"><button class="btn-warning btn-sm"><i class="fa fa-link" aria-hidden="true"></i></button></a>
                        </div>
                    @endforeach
                    @else
                        <div class="alert alert-info my-2" role="alert">
                            no posts yet...
                        </div>
                    @endif
                </div>

                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">@reposted_posts</h6>
                    @if(count($reposted_posts)> 0)
                        @foreach($reposted_posts as $p)
                            <div class="media text-muted pt-3">
                                <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"></rect><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>
                                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                    <strong class="d-block text-gray-dark">@ {{\Illuminate\Support\Facades\Auth::user()->name}}</strong>
                                    {{$p->text}}
                                </p>
                                <a href="{{'/forum/post/' . $p->id}}"><button class="btn-warning btn-sm"><i class="fa fa-link" aria-hidden="true"></i></button></a>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info my-2" role="alert">
                            no reposted posts yet...
                        </div>
                    @endif
                </div>

                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">@subs</h6>
                    @if(count($subs) > 0)
                    @foreach($subs as $s)
                    <div class="media text-muted pt-3">
                        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">{{$s->name}}</strong>
                                <a href="{{'/account/' . $s->id}}}">Follow</a>
                            </div>
                            <span class="d-block">@username</span>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <div class="alert alert-info my-2" role="alert">
                            no subs yet...
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
