@component('mail::message')
@component('mail::panel')
    Your account was created successfully.
@endcomponent
    
Use the following credentials to login:

Email: {{ $email }}
<br>
Password: {{ $password }}

@component('mail::button', ['url' => 'https://wedcokenya.org/dashboard'])
Login
@endcomponent
    
@endcomponent