<?php
namespace app\models;

class InterfacemailModel 
{
   
    public static function getPromotion()
    {
        $db = \f3il\Database::getInstance();
        $req = $db->prepare("SELECT DISTINCT promotion FROM eleves2 order by 1");
        try {
            $req->execute();
            $data = $req->fetch();
        } catch(\PDOException $exp) {
            throw new \f3il\errors\SqlError($exp->getMessage(),$req,$exp);
        }
        return $data;        
    }
  }
