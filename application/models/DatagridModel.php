<?php
namespace app\models;
use f3il\Error;

class DatagridModel
{

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


	public static function export($data,$tab) {
		$r = "[";
		foreach($data as $k=>$d) {
			$r=$r."[";
			foreach($tab as $elem) 
				$r = $r."\"".$d[$elem]."\",";
			$r[strlen($r)-1]=' ';
			$r = $r."],"; 
		}
		$r[strlen($r)-1]=']';
		return $r;
	}


	/* ------------------------------ */

	public static function getAll() {
        	$sql = "SELECT nom, prenom, cycle, promotion, groupe FROM eleves2";
		return 	DatagridModel::export(
				DatagridModel::req($sql),
				array('nom','prenom','cycle','promotion','groupe')
			);

    	}

	public static function getElevesFromPromo($prom) {
	$sql = "SELECT nom, prenom, cycle, promotion, groupe FROM eleves2 WHERE promotion=:promotion";
	return 	DatagridModel::export(
			DatagridModel::req(
				$sql,array(':promotion'=>$prom)),
				array('nom','prenom','cycle','promotion','groupe')
		);
	}


    


}
