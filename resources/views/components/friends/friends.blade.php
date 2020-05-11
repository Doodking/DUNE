@section('account')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-2 order-md-2 mb-4 mt-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" href="/forum">Dashboard</a>
                    <a class="nav-link" href="/friends">
                        Friends
                        <span class="badge badge-pill bg-light align-text-bottom">{{count($user)}}</span>
                    </a>
                    <a class="nav-link" href="#">Search other users</a>
                    <a class="nav-link" href="/cart/{{Auth::user()->id}}">Your cart</a>
                    <a class="nav-link" href="/shops">Market</a>
                    <a class="nav-link" href="/shopsofuser/{{Auth::user()->id}}">Shops</a>
                    <a class="nav-link" href="#">Your posts</a>
                    <a class="nav-link" href="#">Your subscribers</a>
                    <a class="nav-link" href="#">Your subscriptions</a>
                    <a class="nav-link" href="/account/chat">Chats</a>
                </div>
            </div>
            <div class="col-md-10 order-md-1">
                <div class="d-flex align-items-center p-3 my-3 text-black-50 bg-purple rounded shadow-sm">
                    <img class="mr-3" src="https://cdn.onlinewebfonts.com/svg/img_314890.png" alt="" width="48" height="48">
                    <div class="lh-100">
                        @guest
                            <h6 class="mb-0 text-black lh-100">Username</h6>
                            <p>Your description:</p>
                            <small>Since your date</small>
                        @else
                            <h6 class="mb-0 text-black lh-100">{{ Auth::user()->name }}<a style="margin-left: 5px" href="/account"><i class="fa fa-user" aria-hidden="true"></i></a></h6>
                            <p>{{ Auth::user()->email }}</p>
                            <small>Date of registration: {{ Auth::user()->created_at }}</small>
                        @endguest
                    </div>
                </div>

                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <form action="{{route('search')}}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="name" placeholder="Имя пользователя">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-warning"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-3">
                        @foreach($user as $u)
                            <div class="alert alert-light alert-dismissible fade show" role="alert">
                                <strong>{{$u->name}}</strong>
                                <a href="{{'/account/user/' . $u->id}}"><button type="button" class="close" aria-label="Close">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
