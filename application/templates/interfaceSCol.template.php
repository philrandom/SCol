<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Vie Scol template</h1>

    <div class="container">
        <div class="row">
            <div class="col-3">
                <?php $this->insertModule("Logout"); ?>
            </div>
            <div class="col-5">
                <p style="font-size: 15pt">Consultez les relevés de notes ou créez-en un nouveau.</br>Bienvenue dans <B>SCol</B>.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
            <?php $this->insertModule("BoutonCreationReleve"); ?>
                <?php $this->insertModule("Interfacemail"); ?>
            </div>
            <div class="col-9">
                <?php $this->insertModule("Datagrid"); ?>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>