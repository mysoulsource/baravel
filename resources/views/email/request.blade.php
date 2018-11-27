@component('mail::message')
# Blood Request Notification

{{$requested_by->name}} request you for donating blood.
on {{$request->date}}
in {{$request->location}}
@if($request->urgency==1)
type Highl
@elseif($request->urgency==2)
type Medium
@else
type Low
@endif
{{$request->message}}
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
