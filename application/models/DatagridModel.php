<?php
namespace app\models;
use f3il\Error;

class DatagridModel
{
    public static function getAll()
    {
        $arr = array();
        $db = \f3il\Database::getInstance();
        $req = $db->prepare("SELECT DISTINCT nom, prenom FROM eleves2");
        try {
            $req->execute();
            $data = $req->fetchAll();
            foreach($data as $d)
                $arr[] = $d;
            var_dump($arr);
            return $arr;
        } catch (\PDOException $ex) {
            throw new Error("InterfacemailModel : erreur SQL{$ex->getMessage()}");
        }
    }
}