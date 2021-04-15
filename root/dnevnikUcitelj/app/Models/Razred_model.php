<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Razred_model extends Model{

	public function razred_naziv_get($idRazrednik)
	{
		//
		// Pridobi naziv razreda
		//

		$db = \Config\Database::connect();
		$builder = $db->table('razred');

		$builder->select('idRazred, nazivRazred');
		$builder->where('idRazrednik', $idRazrednik);
		$query = $builder->get();
		$razred_podatki = $query->getResult();


		return $razred_podatki;
	}


	public function razred_podatki_osnovno_get($idRazred)
	{
		//
		// Pridobi osnovne podatke o razredu
		//

		$db = \Config\Database::connect();

		// Pridobi število dijakov, ki jih je v razredu
		$builder = $db->table('dijak');
		$builder->select('COUNT(*) AS st_dijakov');
		$builder->where('Razred_idRazred', $idRazred);
		$query = $builder->get();
		$podatki_osnovno['st_dijakov'] = $query->getResult()[0];


		// Prodbi IDje vseh dijakov v razredu
		$builder = $db->table('dijak');
		$builder->select('idDijak');
		$builder->where('Razred_idRazred', $idRazred);
		$podatki_osnovno['id_dijaki'] = $query->getResult()[0];



		// Pridobi število ocen dijakov v razredu
		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_ocen');
		$builder->where('Dijak_Razred_idRazred', $idRazred);
		$builder->whereNotIn('ocenaZapisek', [0]);
		$query = $builder->get();
		$podatki_osnovno['st_ocen'] = $query->getResult()[0];



		// Pridobi povprečno oceno dijakov v razredu
		$builder = $db->table('zapisek');
		$builder->select('AVG(ocenaZapisek) AS povp_ocena');
		$builder->where('Dijak_Razred_idRazred', $idRazred);
		$builder->whereNotIn('ocenaZapisek', [0]);
		$query = $builder->get();
		$podatki_osnovno['povp_ocena'] = $query->getResult()[0];


		// Pridobi število predmetov, ki jih razred obiskuje
		$builder = $db->table('razredobiskujepredmet');
		$builder->select('COUNT(*) AS st_predmetov');
		$builder->where('Razred_idRazred', $idRazred);
		$query = $builder->get();
		$podatki_osnovno['st_predmetov'] = $query->getResult()[0];


		return $podatki_osnovno;
	}

	public function razred_podatki_ocene_get($idRazred)
	{
		//
		// Pridobi podatke o ocena razreda (st 5, 4, 3...)
		//

		$db = \Config\Database::connect();

		// Pridobi stevilo pojavov vsake ocene
		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_pet');
		$builder->where('ocenaZapisek', 5);
		$builder->where('Dijak_Razred_idRazred', $idRazred);
		$query = $builder->get();
		$podatki_ocen['st_pet'] = $query->getResult()[0];

		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_stiri');
		$builder->where('ocenaZapisek', 4);
		$builder->where('Dijak_Razred_idRazred', $idRazred);
		$query = $builder->get();
		$podatki_ocen['st_stiri'] = $query->getResult()[0];

		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_tri');
		$builder->where('ocenaZapisek', 3);
		$builder->where('Dijak_Razred_idRazred', $idRazred);
		$query = $builder->get();
		$podatki_ocen['st_tri'] = $query->getResult()[0];

		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_dve');
		$builder->where('ocenaZapisek', 2);
		$builder->where('Dijak_Razred_idRazred', $idRazred);
		$query = $builder->get();
		$podatki_ocen['st_dve'] = $query->getResult()[0];

		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_ena');
		$builder->where('ocenaZapisek', 1);
		$builder->where('Dijak_Razred_idRazred', $idRazred);
		$query = $builder->get();
		$podatki_ocen['st_ena'] = $query->getResult()[0];


		return $podatki_ocen;
	}


	public function razred_ocene_get($idRazred)
	{
		//
		// Pridobi vse ocene razreda
		//

		$db = \Config\Database::connect();

		$builder = $db->table('zapisek');
		$builder->select('ocenaZapisek, datumZapisek');
		$builder->where('Dijak_Razred_idRazred', $idRazred);
		$builder->orderBy('datumZapisek', 'ASC');
		$query = $builder->get();
		$ocene = $query->getResult();


		return $ocene;

	}


	public function razred_dijaki_get($idUporabnik)
	{
		$db = \Config\Database::connect();
		$builder = $db->table('dijak');
		$builder->select('idDijak, imeDijak, priimekDijak, nazivRazred');
		$builder->join('razred', 'Razred_idRazred=idRazred', 'left');
		$builder->where('Razred.idRazrednik', $idUporabnik);

		$query = $builder->get();
		$results = $query->getResult();

		return $results;

	}

}