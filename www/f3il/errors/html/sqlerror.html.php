<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Error</title>
</head>
<body>
    <h1>SQL Error</h1>
    <p><?php echo $this->message;?></p>
    <pre>
        <?php echo $this->query->debugDumpParams();?>
    </pre>
    <dl>
        <dl>Fichier : </dl>
        <dd><?php echo $file;?></dd>
        <dl>Ligne : </dl>
        <dd><?php echo $line;?></dd>
        <dl>Function : </dl>
        <dd><?php echo $function;?></dd>
    </dl>
    <pre><?php echo $this->getTraceAsString();?></pre>
</body>
</html>