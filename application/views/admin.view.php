<?php
$message = \f3il\Messenger::getMessage();
if ($message) : ?>
    <div class="alert alert-success">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<a href="?controller=accueil&action=ajouter">
    <button class="btn btn-primary mb-2">Ajouter Utilisateur</button>
</a>

<table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">Identifiant</th>
            <th scope="col">Type</th>
            <th scope="col">Commandes</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->utilisateurs as $u) : ?>
            <tr>
                <td><?php echo filter_var($u['identifiant'], FILTER_SANITIZE_SPECIAL_CHARS); ?></td>
                <td><?php echo filter_var($u['type'], FILTER_SANITIZE_SPECIAL_CHARS); ?></td>
                <td><a href="?controller=accueil&action=editer&id=<?php echo $u['id']; ?>">
                        <button class="btn btn-link">Modifier</button>
                    </a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>