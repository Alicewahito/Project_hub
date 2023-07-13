@component('mail::message')
@component('mail::panel')
    Your password successfully reset.
@endcomponent
    
Use the following credentials to login:

Email: {{ $email }}
<br>
Password: {{ $password }}

@component('mail::button', ['url' => 'https://wedcokenya.org/dashboard'])
Login
@endcomponent
    
@endcomponent