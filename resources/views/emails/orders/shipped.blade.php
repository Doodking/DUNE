@component('mail::message')
Hello, user!
It's check of your order. Let's see it!

@component('mail::table')
    | Product       | Price         | Total price   |
    | ------------- |:-------------:| --------:     |
    |               |               | {{$total}}$   |
    @foreach($order as $o)
        @foreach($o as $p)
    |{{$p->name }}  |{{ $p->price}}$|               |
        @endforeach
    @endforeach
@endcomponent

@component('mail::button', ['url' => 'http://localhost:8000/'])
Button Text
@endcomponent

Thanks,<br>

@endcomponent
