<?php

namespace app\modules;

class Interfacemail implements \f3il\Module
{
    public function render() {
        ?>

        <div>
            <ul class="list-group">
                <li class="list-group-item">Nouveaux</li>
                <li class="list-group-item">Brouillons</li>
                <li class="list-group-item">Traités</li>
                <li class="list-group-item">Promotions</li>
            </ul>
        </div><?php
    }
}