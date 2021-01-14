<?php

use app\models\InterfacemailModel;
?>

<h2>Création d'un relevé de notes.</h2>
<div id="error"></div>
<form method="POST" id="form">
  <label>Cursus</label>
  <select class="form-select" id="cursus" aria-label="Default select example">
    <option selected>Choisissez le cursus</option>
    <?php
    foreach (InterfacemailModel::getCycle() as $cycle)
      echo '<option value="' . $cycle . '">' . $cycle . '</option>';
    ?>
  </select>

  <label>Promotion</label>
  <select class="form-select" id="promotion" aria-label="Default select example">
    <option selected>Choisissez la promotion</option>
    <?php
    foreach (InterfacemailModel::getPromotion() as $prom)
      echo '<option value="' . $prom . '">' . $prom . '</option>';
    ?>
  </select>

  <div class="input-group mb-3">
    <span class="input-group-text">Matière</span>
    <input type="text" class="form-control" id="matiere" placeholder="Par exemple : Développement Web" aria-label="matiere" aria-describedby="basic-addon1" required>
  </div>

  <div class="input-group mb-3">
    <span class="input-group-text">Année scolaire</span>
    <input type="text" class="form-control" id="anneescolaire" placeholder="Par exemple : 2020-2021" aria-label="anneescolaire" aria-describedby="basic-addon1" required>
  </div>

  <div class="input-group mb-3">
    <span class="input-group-text">Type d'épreuve</span>
    <input type="text" class="form-control" id="typeexamen" placeholder="EI, DS, TP, Mini-Projet..." aria-label="typeexamen" aria-describedby="basic-addon1" required>
  </div>

  <div class="input-group mb-3">
    <span class="input-group-text">Titre de l'épreuve</span>
    <input type="text" class="form-control" id="titreexamen" placeholder="Thème de l'épreuve, Chapitre couvert lors du DS..." aria-label="typeexamen" aria-describedby="basic-addon1" required>
  </div>

  <div class="input-group mb-3">
    <span class="input-group-text">Date de l'examen</span>
    <input type="text" class="form-control" id="dateexamen" placeholder="Au format JJ/MM/AAAA" aria-label="dateexamen" aria-describedby="basic-addon1" required>
  </div>

  <button type="submit" class="btn btn-primary">Confirmer</button>
</form>