<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'un relevé de notes</title>
</head>

<body>
    <h1>Template tout simple</h1>
    <?php $this->insertView(); ?>
    <?php $this->insertModule("BoutonRetourAccueil"); ?>
</body>

<script>
    const cursus = document.getElementById('cursus')
    const promotion = document.getElementById('promotion')
    const form = document.getElementById('form')
    const errorElement = document.getElementById('error')
    form.addEventListener('submit', (e) => {
        let messages = []
        if (cursus.value === 'CPi') {
            if (promotion.value !== '1' || promotion.value !== '2') {
                alert('Choisissez une promotion valide pour le cursus CPi')
            }
        }
        if (cursus.value === '3iL Ing') {
            if (promotion.value !== 'I1' || promotion.value !== 'I2' || promotion.value !== 'I3') {
                alert('Choisissez une promotion valide pour le cursus 3iL Ingénieurs')
            }
        }
        if (cursus.value === 'Bc Info') {
            if (promotion.value !== 'B3') {
                alert('Choisissez une promotion valide pour le cursus Bc Info')
            }
        }
        if (cursus.value === 'Ms Info') {
            if (promotion.value !== 'M1' || promotion.value !== 'M2') {
                alert('Choisissez une promotion valide pour le cursus Master')
            }
        }
        if (promotion.value == 'Choisissez la promotion' || cursus.value == 'Choisissez le cursus') {
            alert('Veuillez remplir tous les champs')
        }
    })
</script>

</html>