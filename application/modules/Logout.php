<?php
namespace app\modules;

use f3il\Authentication;

class Logout implements \f3il\Module
{
    public function render() {
        $auth = Authentication::getInstance();
        if(!$auth->isLoggedIn()) {
            return;
        }

        $user = $auth->getUser();
        ?>
        <div class="card">
        <div class="car-body">
            <p>Bonjour, <?php echo $user['identifiant'];?>. Vous êtes <?php echo $user['type'];?>.</p>
            <p>Nous sommes heureux de vous voir.</p>    
            <a href="?controller=index&action=logout"><button class="btn btn-primary">Se déconnecter</button></a>
        </div>
        </div>
        
        <?php
    }
}