<?php
namespace app\models;

class UtilisateursModel implements \f3il\AuthenticationInterface
{
    public static function auth_getCredentialsInfos()
    {
        return [
            "id" => "id",
            "login" => "identifiant",
            "password" => "motdepasse"
        ];        
    }
   
    public static function auth_getUserById($id)
    {
        return self::get($id);        
    }

    public static function auth_getUserByLogin($login)
    {
        $db = \f3il\Database::getInstance();
        $req = $db->prepare("SELECT * FROM utilisateurs WHERE identifiant=:login");
        try {
            $req->bindValue(':login',$login);
            $req->execute();
            $data = $req->fetch();
        } catch(\PDOException $exp) {
            throw new \f3il\errors\SqlError($exp->getMessage(),$req,$exp);
        }
        return $data;        
    }

    public static function get($id) {
        $db = \f3il\Database::getInstance();
        $req = $db->prepare("SELECT * FROM utilisateurs WHERE id=:id");
        try {
            $req->bindValue(':id',$id);
            $req->execute();
            $data = $req->fetch();
        } catch(\PDOException $exp) {
            throw new \f3il\errors\SqlError($exp->getMessage(),$req,$exp);
        }
        return $data;
    }
}