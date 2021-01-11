<?php

namespace app\modules;

use f3il\Module;

class Datagrid extends Module
{
    public function render()
    {
    echo        
    '<script type="text/Javascript> new gridjs.Grid({
            columns: ["Nom", "Prénom", "Cycle", "Promotion", "Groupe"],
            sort: "true",
            data: ['.
                foreach ($this->eleves2 as $e) :
                    echo
                    '['.
                    filter_var($e["nom"], FILTER_SANITIZE_SPECIAL_CHARS).",".
                    filter_var($e["prenom"], FILTER_SANITIZE_SPECIAL_CHARS).",".
                    filter_var($e["cycle"], FILTER_SANITIZE_SPECIAL_CHARS).",".
                    filter_var($e["promotion"], FILTER_SANITIZE_SPECIAL_CHARS).",".
                    filter_var($e["groupe"], FILTER_SANITIZE_SPECIAL_CHARS).",".   
                    ']';
                endforeach;
            '}).render(document.getElementById("wrapper"));
            </script>';
    }
}