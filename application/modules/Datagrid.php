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
                search: true,
                sort: true,
                data: <?php echo DatagridModel::getElevesFromPromo($_GET['prom']); ?>,
                pagination: {
                    enabled: true,
                    limit: 20,
                    summary: false
                },
                language: {
                    'search': {
                        'placeholder': ' Recherche...'
                    }
                }
            }).render(document.getElementById("wrapper5"));
            grid.on('rowClick', (...args) => console.log('row: ' + JSON.stringify(args), args));
            grid.on('cellClick', (...args) => console.log('cell: ' + JSON.stringify(args), args));
        </script>
<?php
    }
}
