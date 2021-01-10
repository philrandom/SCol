<?php
namespace app\models;

use \f3il\Database;
use \f3il\errors\SqlError;
use \f3il\Error;

class InterfacemailModel
{
    public static function getPromotion()
    {
        $db = \f3il\Database::getInstance();
        $req = $db->prepare("SELECT DISTINCT promotion FROM eleves2 order by 1");
        try {
            $req->execute();
            $data = $req->fetch();
            echo "cc";
        } catch (\PDOException $ex) {
            throw new Error("InterfacemailModel : erreur SQL{$ex->getMessage()}");
            return $data;
        }
    }
}
