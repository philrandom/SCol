<?php

namespace app\modules;

use app\models\DatagridModel;

class Datagrid implements \f3il\Module
{
    public function render()
    {
?>
        <script src="https://unpkg.com/gridjs/dist/gridjs.development.js"></script>
        <div id="wrapper5"></div>
        <script>
            new gridjs.Grid({
                columns: ["Nom", "Prénom", "Cycle", "Promotion", "Groupe"],
                sort: true,
                data: <?php echo DatagridModel::getElevesFromPromo($_GET['prom']); ?>,
                pagination: {
                    enabled: true,
                    limit: 20,
                    summary: false
                }
            }).render(document.getElementById("wrapper5"));
        </script>
<?php
    }
}
