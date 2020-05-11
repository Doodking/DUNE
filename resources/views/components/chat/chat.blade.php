@section('chat')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-2 order-md-2 mb-4 mt-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" href="/forum">Dashboard</a>
                    <a class="nav-link" href="/friends">
                        Friends
                        <span class="badge badge-pill bg-light align-text-bottom">27</span>
                    </a>
                    <a class="nav-link" href="#">Search other users</a>
                    <a class="nav-link" href="/cart/{{Auth::user()->id}}">Your cart</a>
                    <a class="nav-link" href="/shops">Market</a>
                    <a class="nav-link" href="/shopsofuser/{{Auth::user()->id}}">Shops</a>
                    <a class="nav-link" href="#">Your posts</a>
                    <a class="nav-link" href="/account/subs">Your subscribers</a>
                    <a class="nav-link" href="/account/subscr">Your subscriptions</a>
                    <a class="nav-link active" href="/account/chat">Chats</a>
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
                            <h6 class="mb-0 text-black lh-100">{{ Auth::user()->name}}</h6>
                        @endguest
                    </div>
                </div>

                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Chat</div>

                                    <div class="panel-body">
                                        <chat-message :messages="messages"></chat-message>
                                    </div>
                                    <div class="panel-footer">
                                        <message-send
                                            v-on:messagesent="addMessage"
                                            :user="{{ Auth::user() }}"
                                        ></message-send>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
