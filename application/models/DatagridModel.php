<?php
namespace app\models;
use f3il\Error;

class DatagridModel
{
    public static function getAll()
    {
        $r = '[';
        $arr = array();
        $db = \f3il\Database::getInstance();
        $req = $db->prepare("SELECT DISTINCT nom, prenom FROM eleves2");
        try {
            $req->execute();
            $data = $req->fetchAll();
            foreach($data as $k=>$d)
                $r = $r."['".$k."'=>'".$d."'],";
            $r[strlen($r)-1] = ' ';
            $r = $r."]";
            return $r;
        } catch (\PDOException $ex) {
            throw new Error("InterfacemailModel : erreur SQL{$ex->getMessage()}");
        }
    }
}