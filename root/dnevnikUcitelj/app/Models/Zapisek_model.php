<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Zapisek_model extends Model
{

	public function zapisek_podatki_osnovno_get($idZapisek)
	{
		
		$db = \Config\Database::connect();

		$builder = $db->table('zapisek');
		$builder->select('idZapisek, datumZapisek, naslovZapisek, ocenaZapisek, vsebinaZapisek, imeUporabnik, priimekUporabnik, imeDijak, priimekDijak, nazivRazred, nazivPredmet');
		$builder->join('uporabnik', 'zapisek.Uporabnik_idUporabnik=uporabnik.idUporabnik');
		$builder->join('dijak', 'zapisek.Dijak_idDijak=dijak.idDijak');
		$builder->join('razred', 'zapisek.Dijak_Razred_idRazred=razred.idRazred');
		$builder->join('predmet', 'zapisek.Predmet_idPredmet=predmet.idPredmet', 'left');
		$builder->where('idZapisek', $idZapisek);
		$query = $builder->get();
		$zapisek_podatki = $query->getResult();



		return $zapisek_podatki;
	}


}