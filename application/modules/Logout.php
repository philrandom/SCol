<?php

namespace app\modules;

use f3il\Authentication;

class Logout implements \f3il\Module
{
    public function render()
    {
        $auth = Authentication::getInstance();
        if (!$auth->isLoggedIn()) {
            return;
        }

        $user = $auth->getUser();
?>
        <div class="card">
            <div class="card-header">
                Bonjour, <?php echo $user['identifiant']; ?>.
            </div>
            <div class="card-body">
                <h5 class="card-title">Vous êtes <?php echo $user['type']; ?>.</h5>
                <p class="card-text">Nous sommes heureux de vous voir.</p>
            </div>
        </div>
<?php
    }
}
