@section('threads')
    <div class="my-3 border-bottom">
        <h3 style="text-align: center">TOP THEMES</h3>
    </div>
    @foreach($posts as $p)
    <div class="alert alert-success" role="alert">
        <h3 class="alert-heading">{{$p->title}}</h3>
        <strong>{{$p->text}}</strong>
        <hr>
        <h6 class="mb-0">Category: {{$p->category}}</h6>
        <a href="{{'/' . 'forum/post/' . $p->id}}"><button class="btn btn-info mt-0" id="click">continue....</button></a>
    </div>
    @endforeach
    {{--<div class="alert alert-primary" role="alert">
        <h3>This is a project of Doodking?</h3>
        <p>Yes, I'm the only one trying hard to ensure that this project saw the light, I hope you will appreciate my efforts.</p>
    </div>
    <div class="alert alert-primary" role="alert">
        <h3>What if I paid for an item but didn't receive it?</h3>
        <p>Безусловно, это одна из часто встречающихся проблем на любом маркете. Мы стараемся банить нечестных продавцов и с вероятностью 70% возвращаем деньги нашим покупателям, но для этого нам нужны доказательства, которые вы можете прислать модератору через форму ниже.</p>
    </div>
    <div class="alert alert-primary" role="alert">
        <h3>Is it safe to leave card details on the market?</h3>
        <p>In general, this is quite insecure, but thanks to our encryption, the data that is saved in Yandex. market remains only with you, and the seller, moderator, or even admin can't access it.</p>
    </div>
    <div class="alert alert-primary" role="alert">
        <h3>How to become a moderator?</h3>
        <p>This is quite difficult, because we are quite careful about our working staff, but if you have a desire, leave your contact information in the form with a note about the work, as well as write your main skills and experience.</p>
    </div>
    <div class="alert alert-primary" role="alert">
        <h3>Can DUNE be closed?</h3>
        <p>We think not! After all, the admin is located in a galaxy far, far away, and the servers are on the dark side of the moon.</p>
    </div>--}}

