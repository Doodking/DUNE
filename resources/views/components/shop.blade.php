@section('shop')
    {{--<div class="card mb-3">
        <img src="https://content.communicorpuk.com/hs-fs/hubfs/Archive%20images/maccies.png?width=2000&name=maccies.png" width="1000px" height="200px" class="card-img-top" alt="...">
        <div class="card-body" style="text-align: center">
            <h5 class="card-title">MAC SHOP</h5>
            <p class="card-text">Hello, everyone! In our shop you can find everything that you need</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            <button type="button" class="btn btn-outline-danger">Continue...</button>
        </div>
    </div>
    <div class="card mb-3">
        <img src="http://img.advertology.ru/aimages/2017/04/24/vegget19.jpg" width="1000px" height="200px" class="card-img-top" alt="...">
        <div class="card-body" style="text-align: center">
            <h5 class="card-title">SUBWAY SHOP</h5>
            <p class="card-text">Hello, people! We're waiting for you!</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            <button type="button" class="btn btn-outline-danger">Continue...</button>
        </div>
    </div>
    <div class="card mb-3">
        <img src="https://4bnd0r4d1imo370lqu9t0tb1-wpengine.netdna-ssl.com/wp-content/uploads/2019/09/Click-and-mortar-les-cas-concrets-et-leurs-stratégies-IKEA.png" width="1000px" height="200px" class="card-img-top" alt="...">
        <div class="card-body" style="text-align: center">
            <h5 class="card-title">IKEA SHOP</h5>
            <p class="card-text">Welcome to our little shop on this marketplace!</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            <button type="button" class="btn btn-outline-danger">Continue...</button>
        </div>
    </div>--}}
    @foreach($shops as $shop)
        <div class="card mb-3">
            <img src="{{ asset('storage/images/' . $shop->filename ) }}" width="1000px" height="200px" class="card-img-top" alt="...">
            <div class="card-body" style="text-align: center">
                <h4 class="card-title">{{$shop->name}}</h4>
                <h6 class="card-text mb-5">{{$shop->description}}</h6>
                <a href="{{'shopsofuser/shopsofuser/' . Auth::user()->id . '/shop/' . $shop->id}}"><button type="button" class="btn btn-outline-danger">Continue...</button></a>
            </div>
        </div>
    @endforeach
    <div class="collapse" id="collapseExample">
        @foreach($shops2 as $shop)
            <div class="card mb-3">
                <img src="{{ asset('storage/images/' . $shop->filename ) }}" width="1000px" height="200px" class="card-img-top" alt="...">
                <div class="card-body" style="text-align: center">
                    <h5 class="card-title">{{$shop->name}}</h5>
                    <h4 class="card-text">{{$shop->description}}</h4>
                    <a href="{{'shopsofuser/shopsofuser/' . Auth::user()->id . '/shop/' . $shop->id}}"><button type="button" class="btn btn-outline-danger">Continue...</button></a>
                </div>
            </div>
        @endforeach
    </div>
