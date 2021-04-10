<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Dijak_model extends Model{


	public function dijak_podatki_osnovno_get($idDijak)
	{
		//
		// Pridobi osnovne podatke dijaka
		//

		$db = \Config\Database::connect();

		$builder = $db->table('dijak');
		$builder->select('idDijak, imeDijak, priimekDijak, Razred_idRazred, nazivRazred');
		$builder->join('razred', 'dijak.Razred_idRazred = razred.idRazred');
		$builder->where('idDijak', $idDijak);
		$query = $builder->get();
		$dijak_podatki = $query->getResult();


		return $dijak_podatki;

	}


	public function dijak_ocene_osnovno_get($idDijak, $idRazred)
	{
		//
		// Pridobi osnovne podatke o ocenah dijaka
		//
		
		$db = \Config\Database::connect();

		// Pridobi število ocen dijaka
		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_ocen');
		$builder->where('Dijak_idDijak', $idDijak);
		$builder->whereNotIn('ocenaZapisek', [0]);
		$query = $builder->get();
		$podatki_osnovno['st_ocen'] = $query->getResult()[0];



		// Pridobi povprečno oceno dijaka
		$builder = $db->table('zapisek');
		$builder->select('AVG(ocenaZapisek) AS povp_ocena');
		$builder->where('Dijak_idDijak', $idDijak);
		$builder->whereNotIn('ocenaZapisek', [0]);
		$query = $builder->get();
		$podatki_osnovno['povp_ocena'] = $query->getResult()[0];


		// Pridobi število predmetov, ki jih dijak obiskuje
		$builder = $db->table('razredobiskujepredmet');
		$builder->select('COUNT(*) AS st_predmetov');
		$builder->where('Razred_idRazred', $idRazred);
		$query = $builder->get();
		$podatki_osnovno['st_predmetov'] = $query->getResult()[0];


		return $podatki_osnovno;
	}

	public function dijak_ocene_get($idDijak)
	{
		//
		// Pridobi vse ocene dijaka
		//

		$db = \Config\Database::connect();

		$builder = $db->table('zapisek');
		$builder->select('AVG(ocenaZapisek) AS ocenaZapisek, datumZapisek, naslovZapisek, idZapisek');
		$builder->where('Dijak_idDijak', $idDijak);
		$builder->groupBy('datumZapisek');

		$query = $builder->get();
		$dijak_ocene_osnovno = $query->getResult();

		return $dijak_ocene_osnovno;


	}

	public function dijak_ocene2_get($idDijak)
	{
		//
		// Pridobi podatke o ocenah dijaka (st 5, 4, 3...)
		//

		$db = \Config\Database::connect();

		// Pridobi stevilo pojavov vsake ocene
		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_pet');
		$builder->where('ocenaZapisek', 5);
		$builder->where('Dijak_idDijak', $idDijak);
		$query = $builder->get();
		$podatki_ocen['st_pet'] = $query->getResult()[0];

		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_stiri');
		$builder->where('ocenaZapisek', 4);
		$builder->where('Dijak_idDijak', $idDijak);
		$query = $builder->get();
		$podatki_ocen['st_stiri'] = $query->getResult()[0];

		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_tri');
		$builder->where('ocenaZapisek', 3);
		$builder->where('Dijak_idDijak', $idDijak);
		$query = $builder->get();
		$podatki_ocen['st_tri'] = $query->getResult()[0];

		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_dve');
		$builder->where('ocenaZapisek', 2);
		$builder->where('Dijak_idDijak', $idDijak);
		$query = $builder->get();
		$podatki_ocen['st_dve'] = $query->getResult()[0];

		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_ena');
		$builder->where('ocenaZapisek', 1);
		$builder->where('Dijak_idDijak', $idDijak);
		$query = $builder->get();
		$podatki_ocen['st_ena'] = $query->getResult()[0];


		return $podatki_ocen;

	}


}