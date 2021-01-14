<?php
namespace app\models;

use Error;
use f3il\Database;
use \f3il\errors\SqlError;

class UtilisateursModel implements \f3il\AuthenticationInterface
{
    public static function auth_getCredentialsInfos()
    {
        return [
            "id" => "id",
            "type" => "type",
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

    public static function getAllUsers() {
        $pdo = Database::getInstance();
        $req = $pdo->prepare("SELECT * FROM utilisateurs ORDER BY identifiant");
        try {
            $req->execute();
            $data = $req->fetchAll();
        } catch(\PDOException $ex) {
            throw new Error("UtilisateursModel : getAllUsers - error : {$ex->getMessage()}");
        }
        return $data;
    }

    public static function insert($data) {
        $expectedKeys = ['identifiant','type'];
        $missingKeys = array_diff($expectedKeys, array_keys($data));
        foreach($missingKeys as $key) {
            throw new Error("MaterielsModel : '$key' ne figure pas dans les données transmises");
        }
        $pdo = Database::getInstance();

        $req = $pdo->prepare("INSERT INTO Utilisateurs (identifiant, type) "."VALUES (:identifiant, :type)");
        try {
            $req->bindValue(':identifiant',$data['identifiant']);
            $req->bindValue(':type',$data['type']);
            $req->execute();
        } catch(\PDOException $ex) {
            throw new SQLError("MaterielsModel : erreur SQL {$ex->getMessage()}",$req);
        }
        return $pdo->lastInsertId();
    }

    public static function update($id, $data) {
        $expectedKeys = ['identifiant','type'];
        $missingKeys = array_diff($expectedKeys, array_keys($data));
        foreach($missingKeys as $key) {
            throw new Error("MaterielsModel : '$key' ne figure pas dans les données transmises");
        }
        $pdo = Database::getInstance();

        $req = $pdo->prepare("UPDATE Utilisateurs SET ".
            "identifiant = :identifiant, type = :type ".
            "WHERE id = :id"        
        );
        try {
            $req->bindValue(':identifiant',$data['identifiant']);
            $req->bindValue(':type',$data['type']);
            $req->bindValue(':id',$id);
            $req->execute();
        } catch(\PDOException $ex) {
            throw new Error("MaterielsModel : erreur SQL {$ex->getMessage()}");
        }
    }

    public static function delete($id) {
        $pdo = Database::getInstance();

        $req = $pdo->prepare("DELETE FROM Utilisateurs WHERE id = :id");
        try {
            $req->bindValue(':id',$id);
            $req->execute();
        } catch(\PDOException $ex) {
            throw new Error("MaterielsModel : erreur SQL {$ex->getMessage()}");
        }

    }

}