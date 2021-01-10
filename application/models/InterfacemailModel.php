<?php
namespace app\models;

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
}
?>
