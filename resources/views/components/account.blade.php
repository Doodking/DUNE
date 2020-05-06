@section('account')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-2 order-md-2 mb-4 mt-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" href="/forum">Dashboard</a>
                    <a class="nav-link" href="/friends">
                        Friends
                        <span class="badge badge-pill bg-light align-text-bottom">27</span>
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
                    <img class="mr-3" src="https://cdn.onlinewebfonts.com/svg/img_314890.png" alt="" width="48" height="48">
                    <div class="lh-100">
                        @guest
                            <h6 class="mb-0 text-black lh-100">Username</h6>
                            <p>Your description:</p>
                            <small>Since your date</small>
                        @else
                            <h6 class="mb-0 text-black lh-100">{{ Auth::user()->name }}</h6>
                            <p>{{ Auth::user()->email }}</p>
                            <small>Date of registration: {{ Auth::user()->created_at }}</small>
                        @endguest
                    </div>
                </div>

                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
                    <div class="media text-muted pt-3">
                        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block text-gray-dark">@username</strong>
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                        </p>
                    </div>
                    <div class="media text-muted pt-3">
                        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"></rect><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block text-gray-dark">@username</strong>
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                        </p>
                    </div>
                    <div class="media text-muted pt-3">
                        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"></rect><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block text-gray-dark">@username</strong>
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                        </p>
                    </div>
                    <small class="d-block text-right mt-3">
                        <a href="#">All updates</a>
                    </small>
                </div>

                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
                    <div class="media text-muted pt-3">
                        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Full Name</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@username</span>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Full Name</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@username</span>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Full Name</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@username</span>
                        </div>
                    </div>
                    <small class="d-block text-right mt-3">
                        <a href="#">All suggestions</a>
                    </small>
                </div>
            </div>
        </div>
    </main>
