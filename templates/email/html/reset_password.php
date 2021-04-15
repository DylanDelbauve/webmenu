<p><?= $user->name ?>,</p>

<p>vous retrouverez un lien pour changer votre mot de passe sous ce message.</p>
<p>
    <a href="<?= 'http://' . env('SERVER_NAME') . ':8765/users/reset_password_token/' . $user->reset_password_token; ?>">Réinistialiser le mot de passe</a>
</p>

<p>Ce lien est valide pour une durée de 24h</p>