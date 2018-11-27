@component('mail::message')
    # Blood Request Notification

    {{$requested_to->name}}
    @if($donate->status=1)
        {{'Accpeted'}}
    @else
        {{'Declined with following reason : '}} {{$donate->message}}
    @endif

    Your Request on {{$donate->updated_at}}.


    @component('mail::button', ['url' => ''])
        Button Text
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
