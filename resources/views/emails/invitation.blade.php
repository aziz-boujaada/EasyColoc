@component('mail::message')
# Invitation to join {{ $colocation_name }}

You have been invited to join this colocation.
link : {{$url}}
copy link of invitation to join 


Thanks,<br>
{{ config('app.name') }}
@endcomponent
