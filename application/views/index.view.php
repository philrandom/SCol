<?php

if (isset($this->formMessage)) : ?>

    <div class="aleter alert-primary"><?php echo $this->formMessage; ?></div>
<?php endif; ?>
<div class="jumbotron">
    <p class="text-center" style="font-size: 45pt"><B>SCol</B></p>
</div>
<div class="row">
    <div class="col-md-4 offset-md-4 align-self-center">
        <form method="POST">
            <div class="form-group">
                <label for="login">Login : </label>
                <input type="text" id="login" name="login" placeholder="Identitifiant" class="form-control" value="<?php echo filter_var($this->login, FILTER_SANITIZE_SPECIAL_CHARS); ?>">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe : </label>
                <input type="password" id="password" name="password" placeholder="Mot de passe" class="form-control" value="<?php echo filter_var($this->password, FILTER_SANITIZE_SPECIAL_CHARS); ?>">
            </div>
            <button class="btn btn-primary" type="submit">Connexion</button>

            <?php \f3il\helpers\CsrfHelper::csrf(); ?>
        </form>
    </div>
</div>