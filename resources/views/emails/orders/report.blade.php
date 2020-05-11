@component('mail::message')
    Hello, admin!
    This is the report on some post on your forum. Please check the information about the post and solve it!<br/>
    Title: {{$post->title}} => Text: {{$post->text}}<br/>
    This is the report of {{$author->name}}<br/>
    Category: {{$report->category}}<br/>
    Text: {{$report->text}}<br/>
    Thanks from {{$author->name}}<br/>
    @component('mail::button', ['url' => 'http://localhost:8000/forum'])
        Forum_Link
    @endcomponent
@endcomponent
