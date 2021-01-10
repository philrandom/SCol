<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <h1>Admin Template</h1>
    <div class="row mt-5">
        <div class="col-md-2">
            <?php $this->insertModule("Logout");?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php $this->insertModule("Interfacemail");?>
        </div>
    </div>
    <?php $this->insertView();?>

    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>