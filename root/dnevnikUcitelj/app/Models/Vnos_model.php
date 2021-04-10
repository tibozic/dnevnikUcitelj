<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Vnos_model extends Model
{

	public function vnos_predmet_get($idUporabnik)
	{

		$db = \Config\Database::connect();

		$builder = $db->table('uciteljucipredmet');
		$builder->select('idPredmet, nazivPredmet');
		$builder->join('predmet', 'predmet.idPredmet=uciteljucipredmet.Predmet_idPredmet');
		$builder->where('Uporabnik_idUporabnik', $idUporabnik);
		$query = $builder->get();
		$predmet = $query->getResult();
		

		return $predmet;
	}


}