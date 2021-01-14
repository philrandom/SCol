<?php if (isset($this->formMessage)) : ?>
    <div class="alert alert-success"><?php echo $this->formMessage; ?></div>
<?php endif; ?>

<div class="row">
    <div class="col-8">
        <form method="POST">
            <div class="form-group mb-3">
                <label for="identifiant">Identifiant : </label>
                <input type="text" name="identifiant" id="identifiant" placeholder="Identifiant de l'utilisateur" class="form-control" value="<?php echo filter_var($this->identifiant, FILTER_SANITIZE_SPECIAL_CHARS) ?>">
            </div>
            <div class="form-group mb-3">
                <label for="type">Type d'utilisateur : </label>
                <input type="text" name="type" id="type" placeholder="Type de l'utilisateur" class="form-control" value="<?php echo filter_var($this->type, FILTER_SANITIZE_SPECIAL_CHARS) ?>">
            </div>
            <div class="form-group mb-3">
                <label for="motdepasse">Mot de passe : </label>
                <input type="password" name="motdepasse" id="motdepasse" placeholder="Mot de passe" class="form-control" value="<?php echo filter_var($this->motdepasse, FILTER_SANITIZE_SPECIAL_CHARS) ?>">
            </div>
            <button type="submit" class="btn btn-success mt-3">Envoyer</button>
            <?php \f3il\helpers\CsrfHelper::csrf(); ?>
        </form>
    </div>
    <div class="col-4">
        <div class="card" style="margin-bottom: 25px;">
            <div class="card-header">
                Ajoutez ou modifiez un utilisateur.
            </div>
            <div class="card-body">
                <h5 class="card-title">Tout est sécurisé.</h5>
                <p class="card-text">Les mots de passe sont dotés d'un sel haché. Si vous ne rentrez pas <B>12345</B> ou <B>motdepasse</B>, on ne devrait pas avoir de souci de sécurité.</p>
                <a href="?controller=accueil&action=accueil" class="btn btn-danger">Retour</a>
            </div>
        </div>
    </div>
</div>