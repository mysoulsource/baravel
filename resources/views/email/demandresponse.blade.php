@component('mail::message')
    # Blood Request Notification

   Dear {{$demanded_by->name}}
        {{$accepted_by->name}} accepted your demand.

    on {{$demand->updated_at}}.


    @component('mail::button', ['url' => ''])
        Button Text
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
