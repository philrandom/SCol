<?php

use app\models\InterfacemailModel;
?>

<h2>Création d'un relevé de notes.</h2>
<form>
  <label>Cursus</label>
  <select class="form-select" aria-label="Default select example">
    <option selected>Choisissez le cursus</option>
    <?php
    foreach (InterfacemailModel::getCycle() as $cycle)
      echo '<option value="' . $cycle . '">' . $cycle . '</option>';
    ?>
  </select>

  <label>Promotion</label>
  <select class="form-select" aria-label="Default select example">
    <option selected>Choisissez la promotion</option>
    <?php
    foreach (InterfacemailModel::getPromotion() as $prom)
      echo '<option value="' . $prom . '">' . $prom . '</option>';
    ?>
  </select>

  <div class="input-group mb-3">
    <span class="input-group-text" id="matiere">Matière</span>
    <input type="text" class="form-control" placeholder="Par exemple : Développement Web" aria-label="matiere" aria-describedby="basic-addon1" required>
  </div>

  <div class="input-group mb-3">
    <span class="input-group-text" id="anneescolaire">Année scolaire</span>
    <input type="text" class="form-control" placeholder="Par exemple : 2020-2021" aria-label="anneescolaire" aria-describedby="basic-addon1" required>
  </div>

  <div class="input-group mb-3">
    <span class="input-group-text" id="typeexamen">Type d'épreuve</span>
    <input type="text" class="form-control" placeholder="EI, DS, TP, Mini-Projet..." aria-label="typeexamen" aria-describedby="basic-addon1" required>
  </div>

  <div class="input-group mb-3">
    <span class="input-group-text" id="dateexamen">Date de l'examen</span>
    <input type="text" class="form-control" placeholder="Au format JJ/MM/AAAA" aria-label="dateexamen" aria-describedby="basic-addon1" required>
  </div>
</form>