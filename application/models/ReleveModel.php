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
		$sql =  'SELECT value->"$.promotion", value->>"$.type", value->>"$.titre", value->>"$.prof_nom", value->>"$.date_a_rendre" '
			.' from releves';
		if( $prof_nom == NULL ) {
			/* Vie scolaire section 
			 * Nouveau : releve rendu par enseingant */
			$sql = $sql.' where value->>"$.tag_vs" like :flag';
			return ReleveModel::req($sql,array(":flag"=>$flag));
		} else {
			/* Prof section
			 * Nouveau : pas de note encore entrée */
			$sql = $sql.' where value->>"$.tag_prof" like :flag';
			$sql = $sql.' and value->>"$.prof_nom" like :prof_nom';
			return ReleveModel::req($sql,array(":flag"=>$flag,":prof_nom"=>$prof_nom));
		}
	}

}
?>
