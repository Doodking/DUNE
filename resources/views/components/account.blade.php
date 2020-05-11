@section('account')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-2 order-md-2 mb-4 mt-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" href="/forum">Dashboard</a>
                    <a class="nav-link" href="/account/friends">
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
                {{--<ul>
                    <li>
                        <a class="nav-link active" href="/forum">Dashboard</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/friends">
                            Friends
                            <span class="badge badge-pill bg-light align-text-bottom">27</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Search other users</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/cart/{{Auth::user()->id}}">Your cart</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/shops">Market</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/shopsofuser/{{Auth::user()->id}}">Shops</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Your posts</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Your subscribers</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Your subscriptions</a>
                    </li>
                </ul>--}}
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
                        @guest
                            <h6 class="mb-0 text-black lh-100">Username</h6>
                            <p>Your description:</p>
                            <small>Since your date</small>
                        @else
                            <h6 class="mb-0 text-black lh-100">{{ Auth::user()->name }}</h6>
                            <p>{{ Auth::user()->email }}</p>
                            <small>Date of registration: {{ Auth::user()->created_at }}</small><br/>
                            <button class="btn-warning btn-sm mt-3" type="button" data-toggle="modal" data-target="#avatar"><i class="fa fa-file" aria-hidden="true"></i></button>
                            <div class="modal fade" id="avatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Set avatar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('setAvatar')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Set avatar</label>
                                                    <input type="file" class="form-control" name="image" id="exampleFormControlInput1" placeholder="Name">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Set avatar</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<button class="btn-warning btn-sm"><input type="file" class="custom-file-input" style="width: 20px; height: 5px" id="validatedCustomFile"> Choose the avatar</button>--}}
                        @endguest
                    </div>
                </div>

                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">@posts</h6>
                    @if(count($posts)> 0)
                    @foreach($posts as $p)
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
