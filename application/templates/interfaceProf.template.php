<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface enseignant</title>
</head>

<body>
<?php $this->insertView(); ?>

<div class="container">
    <div class="row">
        <div class="col-3">
            <?php $this->insertModule("Logout"); ?>
        </div>
        <div class="col-9">
            <p style="font-size: 15pt">Retrouvez tous vos relevés de notes, triés par statut.</br>

                Voici <B>SCol</B>.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <?php $this->insertModule("InterfacemailProf"); ?>
        </div>
    </div>
</div>



    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>