<?php
namespace app\modules;

use f3il\Module;

class BoutonRetourAccueil implements Module
{
    public function render()
    {
        ?>
        <a href="?controller=accueil&action=accueil" class="btn btn-primary">Retour</a>
        <?php
    }
}