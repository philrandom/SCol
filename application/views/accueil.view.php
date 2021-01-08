<h2>Accueil View</h2>

<?php
$message = \f3il\Messenger::getMessage();
if($message) :?>
    <p>
        <?php echo $message;?>
    </p>
<?php endif; ?>