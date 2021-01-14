<?php

namespace app\modules;

use f3il\Authentication;

class CreationReleve implements \f3il\Module
{
    public function render()
    {
?>
        <div class="card" style="margin-bottom: 25px;">
            <div class="card-header">
                Création d'un nouveau relevé
            </div>
            <div class="card-body">
                <p class="card-text">Créez un nouveau relevé et affectez-le à un enseignant. Vous retrouverez ce relevé dans la section "En attente".
                Si vous ne le finissez pas, il vous attendra dans les Brouillons.</p>
                <a href="?controller=accueil&action=creation" class="btn btn-primary justify-content-center">Créer</a>
            </div>
        </div>

<?php
    }
}
