@component('mail::message')
# Hi ,
Someone started following you.

@component('mail::button', ['url' => 'risk'])
View
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
