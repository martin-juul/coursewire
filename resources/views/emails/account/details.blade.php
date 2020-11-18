@component('mail::message')
# Hi {{ $name }}

You or someone else requested that we send your account information to you.

Your email is {{ $email }}

We can sadly not give you your password, as that is encrypted.
If you have forgot it, you can reset it by clicking the link below.

@component('mail::button', ['url' => secure_url('/dashboard/password/reset')])
Reset password
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
