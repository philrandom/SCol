<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Simple Template</h1>
    <!--<?php $this->insertModule("Menu");?>
    <?php $this->insertModule("Logout");?>-->
    <?php $this->insertView();?>
    <pre><?php print_r($_SESSION); echo "\n".session_id();?></pre>
</body>
</html>