<?php
$message = \f3il\Messenger::getMessage();
if ($message) : ?>
    <p>
        <?php echo $message; ?>
    </p>
<?php endif; ?>

<a href="?controller=accueil&action=ajouter"><button class="btn btn-primary">Ajouter Utilisateur</button></a>
<ul>
    <?php foreach ($this->utilisateurs as $u) : ?>
        <li>
            <?php echo
            filter_var($u['identifiant'], FILTER_SANITIZE_SPECIAL_CHARS)
                . ' : '
                . filter_var($u['type'], FILTER_SANITIZE_SPECIAL_CHARS);
            ?>
            <a href="?controller=accueil&action=editer&id=<?php echo $u['id']; ?>">Modifier</a>
        <?php endforeach; ?>
</ul>