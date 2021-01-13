<?php
namespace app\models;
use f3il\Error;

class ReleveModel
{
	protected static  $flags = array("Nouveau","Brouillon","En attente","Traité");

	private static function req($demande,$option=NULL) {
		$db = \f3il\Database::getInstance();
		$req = $db->prepare($demande);
		try {
			if( $option == NULL )
				$req->execute();
			else
				$req->execute($option);

			return $req->fetchAll();
		} catch (\PDOException $ex) {
			throw new Error("ReleveModel : erreur SQL{$ex->getMessage()}");
		}
	}

	public static function getByTag($flag,$prof_nom=NULL) {
		if( !in_array($flag,self::$flags) ) {
			throw new Error("ReleveModel : erreur d'entrée (flag invalide)");
		}
		$sql =  'SELECT value->"$.promotion", value->"$.prof_nom", value->"$.date_a_rendre" '
			.' from releves'
			.' where value->>"$.tag" like :flag';
		if( $prof_nom == NULL )
			return ReleveModel::req($sql,array(":flag"=>$flag));
		else {
			$sql = $sql.' and value->>"$.prof_nom" like :prof_nom';
			return ReleveModel::req($sql,array(":flag"=>$flag,":prof_nom"=>$prof_nom));
		}
	}

}
?>
