<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Admin Template</h1>
<<<<<<< HEAD
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
=======
    <?php $this->insertModule("Logout");?>
    <?php $this->insertModule("Interfacemail");?>
>>>>>>> cbc22fb2052000984a8a879158a9e3c1ee9234da
    <?php $this->insertView();?>
</body>
</html>
