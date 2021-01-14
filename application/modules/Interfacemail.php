<?php

namespace app\modules;

use app\models\InterfacemailModel;
use app\models\ReleveModel;
use f3il\Authentication;

class Interfacemail implements \f3il\Module
{
  public function render()
  {
    $auth = Authentication::getInstance();
    $user = $auth->getUser();

    $flags = array("Nouveau", "Brouillon", "En attente", "Traité");

    echo '<div class="accordion accordion-flush" id="accordionFlushExample">';
    foreach ($flags as $flag) {
      $flag = str_replace(" ", "_", $flag);
?>

      <!--- Tags -->
      <div class="accordion-item">
        <h2 id="flush-heading<?php echo $flag; ?>">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $flag; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $flag; ?>"><?php echo str_replace("_", " ", $flag); ?></button>
        </h2>
        <div id="flush-collapse<?php echo $flag; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne">
          <?php

          foreach (ReleveModel::getByTag(str_replace("_", " ", $flag), $user["identifiant"]) as $line) {
		  print_r("<div class='accordion-body'><a href='?controller=accueil&action=");
		  echo ($line['value->>"$.tag_prof"']=="Traité") ? "accueil" : "insert_releve" ;
		  print_r("&releve=".$line["id"]."'>" . $line['value->>"$.type"'] . " : " . $line['value->>"$.titre"'] . "</a></div>");
	  }
          ?>
        </div>
      </div>
    <?php } ?>

    <!-- Promotion -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
          Promotions
        </button>
      </h2>
      <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">

        <?php
        foreach (InterfacemailModel::getPromotion() as $prom)
          echo '<div class="accordion-body"><a href="?controller=accueil&action=accueil&prom=' . $prom . '">' . $prom . '</a></div>';
        ?>


      </div>
    </div>
    </div><?php
        }
      }
