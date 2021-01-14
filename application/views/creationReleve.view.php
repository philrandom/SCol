<?php

use app\models\InterfacemailModel;
?>

<div id="error"></div>
<div class="container">
  <h2 class="mb-5">Création d'un nouveau relevé de notes.</h2>
  <form method="POST" id="form">
    <div class="row justify-content-between" style="margin-bottom: 17px;">
      <div class="col-5">
        <label>Cursus</label>
        <select class="form-select" id="cursus" aria-label="Default select example">
          <option selected>Choisissez le cursus</option>
          <?php
          foreach (InterfacemailModel::getCycle() as $cycle)
            echo '<option value="' . $cycle . '">' . $cycle . '</option>';
          ?>
        </select>
      </div>
      <div class="col-5">
        <label>Promotion</label>
        <select class="form-select" id="promotion" aria-label="Default select example">
          <option selected>Choisissez la promotion</option>
          <?php
          foreach (InterfacemailModel::getPromotion() as $prom)
            echo '<option value="' . $prom . '">' . $prom . '</option>';
          ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-8">
        <div class="input-group mb-3">
          <span class="input-group-text">Matière</span>
          <input type="text" class="form-control" id="matiere" placeholder="Par exemple : Développement Web" aria-label="matiere" aria-describedby="basic-addon1" required>
        </div>
      </div>
      <div class="col-4">
        <div class="input-group mb-3">
          <span class="input-group-text">Année scolaire</span>
          <input type="text" class="form-control" id="anneescolaire" placeholder="Par exemple : 2020-2021" aria-label="anneescolaire" aria-describedby="basic-addon1" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
        <div class="input-group mb-3">
          <span class="input-group-text">Date de l'épreuve</span>
          <input type="text" class="form-control" id="typeexamen" placeholder="Au format JJ/MM/AAAA" aria-label="typeexamen" aria-describedby="basic-addon1" required>
        </div>
      </div>
      <div class="col-8">
        <div class="input-group mb-3">
          <span class="input-group-text">Type d'épreuve</span>
          <input type="text" class="form-control" id="typeexamen" placeholder="EI, DS, TP, Mini-Projet..." aria-label="typeexamen" aria-describedby="basic-addon1" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
        <div class="input-group mb-3">
          <span class="input-group-text">Titre de l'épreuve</span>
          <input type="text" class="form-control" id="titreexamen" placeholder="Thème de l'épreuve, Chapitre couvert lors du DS..." aria-label="typeexamen" aria-describedby="basic-addon1" required>
        </div>
      </div>
      <div class="col-8">
        <select class="form-select" id="enseignant" aria-label="Default select example">
          <option selected>Enseignant de la matière</option>
          <?php
          foreach (InterfacemailModel::getProf() as $prof)
            echo '<option value="' . $prof . '">' . $prof . '</option>';
          ?>
        </select>
      </div>
    </div>
    <a href="?controller=accueil&action=accueil" class="btn btn-danger">Retour</a>
    <button type="submit" class="btn btn-success">Confirmer</button>
  </form>
</div>