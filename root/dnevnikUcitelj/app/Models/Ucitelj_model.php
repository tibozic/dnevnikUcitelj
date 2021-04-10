<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Ucitelj_model extends Model
{

	public function ucitelj_podatki_osnovno_get($idUporabnik)
	{
		//
		// Pridobi osnovne podatke ucitelja
		//

		$db = \Config\Database::connect();

		$builder = $db->table('uporabnik');
		$builder->select('idUporabnik, imeUporabnik, priimekUporabnik');
		$builder->where('idUporabnik', $idUporabnik);
		$query = $builder->get();
		$ucitelj_podatki = $query->getResult();

		return $ucitelj_podatki;
	}

	public function ucitelj_podatki_get($idUporabnik)
	{
		//
		// Pridobi bolj podrobne podatke o ucitelju
		//


		$db = \Config\Database::connect();

		// Število dijakov, ki jih učitelj uči
		// najpred pridobi vse razrede, ki obiskuje predmet, ki ga učitelj uči,
		// nato pa preštej koliko dijakov obiskuej tiste razrede

		// pridbi vse predmete, ki jih učitelj uči
		$builder = $db->table('uciteljucipredmet');
		$builder->select('Predmet_idPredmet');
		$builder->where('Uporabnik_idUporabnik', $idUporabnik);
		$query = $builder->get();
		$predmeti = $query->getResult();

		if (count($predmeti) > 0)
		{
			// pridobi vse razrede, ki obiskuje predmete
			$builder = $db->table('razredobiskujepredmet');
			$builder->select('Razred_idRazred');
			//print_r($predmeti);
			$builder->whereIn('Predmet_idPredmet', [$predmeti[0]->Predmet_idPredmet]);
			$query = $builder->get();
			$razredi = $query->getResult();

			// prestej koliko dijakov obiskuje te razrede
			$builder = $db->table('dijak');
			$builder->select('COUNT(*) AS st_dijakov');
			$builder->whereIn('Razred_idRazred', [$razredi[0]->Razred_idRazred]);
			$query = $builder->get();
			$ucitelj_podatki['st_dijakov'] = $query->getResult();
		}
		else
		{
			$ucitelj_podatki['st_dijakov'] = 0;
		}


		//	prestej koliko zapiskov je ucitelj ustavril
		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_zapiskov');
		$builder->where('Uporabnik_idUporabnik', $idUporabnik);
		$query = $builder->get();
		$ucitelj_podatki['st_zapiskov'] = $query->getResult();

		// povprecna ocena zapiskov
		$builder = $db->table('zapisek');
		$builder->select('AVG(ocenaZapisek) AS povp_ocena');
		$builder->where('Uporabnik_idUporabnik', $idUporabnik);
		$builder->whereNotIn('ocenaZapisek', [0]);
		$query = $builder->get();
		$ucitelj_podatki['povp_ocena'] = $query->getResult();

		// pridobi st predmetov, ki jih ucitelj uci
		$builder = $db->table('uciteljucipredmet');
		$builder->select('COUNT(*) AS st_predmetov');
		$builder->where('Uporabnik_idUporabnik', $idUporabnik);
		$query = $builder->get();
		$ucitelj_podatki['st_predmetov'] = $query->getResult();

		return $ucitelj_podatki;

	}
	public function ucitelj_ocene_get($idUporabnik)
	{
		//
		// Pridobi vse ocene, ki jih je podelil ucitelj
		//

		$db = \Config\Database::connect();

		$builder = $db->table('zapisek');
		$builder->select('AVG(ocenaZapisek) AS ocenaZapisek, datumZapisek, naslovZapisek, idZapisek');
		$builder->where('Uporabnik_idUporabnik', $idUporabnik);
		$builder->groupBy('datumZapisek');

		$query = $builder->get();
		$ucitelj_ocene_osnovno = $query->getResult();

		return $ucitelj_ocene_osnovno;
	}

	public function ucitelj_podatki_ocene_get($idUporabnik)
	{
		//
		// Pridobi podatke o pojavu posamezne ocene v zapiskih ucitelja
		//


		$db = \Config\Database::connect();

		// Pridobi stevilo pojavov vsake ocene
		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_pet');
		$builder->where('ocenaZapisek', 5);
		$builder->where('Uporabnik_idUporabnik', $idUporabnik);
		$query = $builder->get();
		$podatki_ocen['st_pet'] = $query->getResult()[0];

		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_stiri');
		$builder->where('ocenaZapisek', 4);
		$builder->where('Uporabnik_idUporabnik', $idUporabnik);
		$query = $builder->get();
		$podatki_ocen['st_stiri'] = $query->getResult()[0];

		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_tri');
		$builder->where('ocenaZapisek', 3);
		$builder->where('Uporabnik_idUporabnik', $idUporabnik);
		$query = $builder->get();
		$podatki_ocen['st_tri'] = $query->getResult()[0];

		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_dve');
		$builder->where('ocenaZapisek', 2);
		$builder->where('Uporabnik_idUporabnik', $idUporabnik);
		$query = $builder->get();
		$podatki_ocen['st_dve'] = $query->getResult()[0];

		$builder = $db->table('zapisek');
		$builder->select('COUNT(*) AS st_ena');
		$builder->where('ocenaZapisek', 1);
		$builder->where('Uporabnik_idUporabnik', $idUporabnik);
		$query = $builder->get();
		$podatki_ocen['st_ena'] = $query->getResult()[0];


		return $podatki_ocen;
	}
	


}