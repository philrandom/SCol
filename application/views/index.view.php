<?php

if(isset($this->formMessage)):?>
    <p><?php echo $this->formMessage;?></p>
<?php endif;?>

<form method="POST">
    <div>
        <label for="login">Login : </label>
        <input type="text" id="login" name="login" placeholder="Identitifiant"
        value="<?php echo filter_var($this->login, FILTER_SANITIZE_SPECIAL_CHARS);?>">
    </div>
    <div>
        <label for="password">Mot de passe : </label>
        <input type="password" id="password" name="password" placeholder="Mot de passe"
        value="<?php echo filter_var($this->password, FILTER_SANITIZE_SPECIAL_CHARS);?>">
    </div>
    <button type="submit">Connexion</button>

    <?php \f3il\helpers\CsrfHelper::csrf();