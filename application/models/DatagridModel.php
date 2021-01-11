<?php
namespace app\models;
use f3il\Error;

class DatagridModel
{
    public static function getAll()
    {
        $r = "[";
        $db = \f3il\Database::getInstance();
        $req = $db->prepare("SELECT nom, prenom, cycle, promotion, groupe FROM eleves2");
        try {
            $req->execute();
            $data = $req->fetchAll();
            foreach($data as $k=>$d)
            	$r = $r."[\"".$d['nom']."\",\"".$d['prenom']."\",\"".$d['cycle']."\",\"".$d['promotion']."\",\"".$d['groupe']."\"],";
	    $r[strlen($r)-1]=' ';
	    return $r."]"; 
        } catch (\PDOException $ex) {
            throw new Error("DatagridModel : erreur SQL{$ex->getMessage()}");
        }
    }
}
