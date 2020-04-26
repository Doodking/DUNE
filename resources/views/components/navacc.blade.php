@section('navacc')
    <div class="nav-scroller bg-white white-sm">
        <nav class="nav nav-underline">
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
        </nav>
    </div>
