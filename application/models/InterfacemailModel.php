<?php
namespace app\models;
use f3il\Error;

class InterfacemailModel
{
	public static function getPromotion() {
		return InterfacemailModel::getPromotionGen();
	}

	public static function getPromotionGen() {
		$arr = array();
		$db = \f3il\Database::getInstance();
		$req = $db->prepare("SELECT DISTINCT promotion FROM eleves2 order by 1;");
		try {
		    $req->execute();
		    $data = $req->fetchAll();
		    foreach( $data as $prom )
			    $arr[] = $prom['promotion'];
		    return $arr;
		} catch (\PDOException $ex) {
		    throw new Error("InterfacemailModel : erreur SQL{$ex->getMessage()}");
		}
	}
	
	public static function getCycle() {
		return InterfacemailModel::getCycleGen();
	}

	public static function getCycleGen() {
		$arr = array();
		$db = \f3il\Database::getInstance();
		$req = $db->prepare("SELECT DISTINCT cycle FROM eleves2 order by 1;");
		try {
		    $req->execute();
		    $data = $req->fetchAll();
		    foreach( $data as $cycle )
			    $arr[] = $cycle['cycle'];
		    return $arr;
		} catch (\PDOException $ex) {
		    throw new Error("InterfacemailModel : erreur SQL{$ex->getMessage()}");
		}
	}	

	public static function getProf() {
		return InterfacemailModel::getProfGen();
	}

	public static function getProfGen() {
		$arr = array();
		$db = \f3il\Database::getInstance();
		$req = $db->prepare("SELECT identifiant FROM utilisateurs WHERE type='enseignant';");
		try {
		    $req->execute();
		    $data = $req->fetchAll();
		    foreach( $data as $prof )
			    $arr[] = $prof['identifiant'];
		    return $arr;
		} catch (\PDOException $ex) {
		    throw new Error("InterfacemailModel : erreur SQL{$ex->getMessage()}");
		}
	}
}