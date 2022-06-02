@component('mail::message')
# Création de compte

Votre compte en tant que docteur a été créé avec succeès.

Login : {{ $user->email }}

Mot de passe : aaaaaaaa

Si vous souhaitez changer de mot de passe, cliquez sur ' Mot de passe oublié ' lors de la connexion

@component('mail::button', ['url' => request()->getSchemeAndHttpHost()])
    Ouvrir {{ config('app.name') }}
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
