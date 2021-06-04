@component('mail::message')
# Account activated

Your account is activated. Please login to Zillowar.com and go to bot page to use the Zillow Auto Responder.

@component('mail::button', ['url' => env('APP_URL').'/signin', 'color' => 'primary'])
Login
@endcomponent

Thanks,<br>
{{ env('APP_NAME') }}
@endcomponent
