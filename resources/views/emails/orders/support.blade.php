@component('mail::message')
    Hello, admin!
    This is the support message of some user of your forum. Please check the information about the message and solve it!<br/>
    Title: {{$support->title}} => Text: {{$support->text}}<br/>
    This is the message of {{$author->name}}<br/>
    Category: {{$support->category}}<br/>
    Text: {{$support->text}}<br/>
    Thanks from {{$author->name}}<br/>
    @component('mail::button', ['url' => 'http://localhost:8000/account/user/' . $author->id])
        Forum_Link
    @endcomponent
@endcomponent
