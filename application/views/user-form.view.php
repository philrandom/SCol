<h2>Ajouter un utilisateur</h2>

<?php if (isset($this->formMessage)) :
    echo '<p>' . $this->formMessage . '</p>';
endif; ?>

<form method="POST">
    <div>
        <label for="identifiant">Identifiant : </label>
        <input type="text" name="identifiant" id="identifiant" placeholder="Identifiant de l'utilisateur"
        value="<?php echo filter_var($this->identifiant, FILTER_SANITIZE_SPECIAL_CHARS) ?>">
    </div>
    <div>
        <label for="type">Type d'utilisateur : </label>
        <input type="text" name="type" id="type" placeholder="Type de l'utilisateur"
        value="<?php echo filter_var($this->type, FILTER_SANITIZE_SPECIAL_CHARS) ?>">
    </div>
    <div>
        <label for="motdepasse">Mot de passe : </label>
        <input type="password" name="motdepasse" id="motdepasse" placeholder="Mot de passe"
        value="<?php echo filter_var($this->motdepasse, FILTER_SANITIZE_SPECIAL_CHARS) ?>">
    </div>
    <button type="submit">Envoyer</button>
    <?php \f3il\helpers\CsrfHelper::csrf(); ?>
</form>