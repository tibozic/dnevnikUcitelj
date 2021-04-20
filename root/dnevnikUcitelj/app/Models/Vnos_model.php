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

	public function vnos_zapisek_podatki_get($idZapisek)
	{
		$db = \Config\Database::connect();
		$builder = "SELECT idZapisek, naslovZapisek, ocenaZapisek, vsebinaZapisek, Dijak_idDijak, predmet_idPredmet FROM zapisek WHERE idZapisek=".$idZapisek.";";
		$query = $db->query($builder);
		$results = $query->getResult();

		return $results;
	}

	public function vnos_zapisek_shrani($idZapiska, $zapisekData)
	{


		$db = \Config\Database::connect();

		/*
		$builder='INSERT INTO zapisek(datumZapisek, naslovZapisek, ocenaZapisek, vsebinaZapisek, Uporabnik_idUporabnik, Dijak_idDijak, Dijak_Razred_idRazred) VALUES (CURDATE(),"'.$_POST["naslov"].'","'.$_POST["ocena"].'","'.$_POST["vsebina"].'",'.$_SESSION["idUporabnik"].','.$_POST["dijak"].',(SELECT Razred_idRazred FROM dijak WHERE dijak.idDijak='.$_POST["dijak"].'));';

		$query=$db->query($builder);
		*/
		

		//pridobi in shrani vse podatke dijaka


		// podatke sharni v PB
		$builder = $db->table('zapisek');

		if ($idZapiska != 'null')
		{
			$builder->where('idZapisek', $idZapiska);
			$builder->update($zapisekData);
		}
		else
		{
			$builder->insert($zapisekData);
		}
	}

	public function vnos_dijak_razred_get($dijak)
	{
		//
		// Pridobi id razreda, za dijaka katerega zapisek vnašamo
		//

		$db = \Config\Database::connect();

		$builder = $db->table('dijak');
		$builder->select('Razred_idRazred');
		$builder->where('dijak.idDijak', $dijak);

		$query = $builder->get();
		$idRazred = $query->getResult()[0]->Razred_idRazred;

		return $idRazred;
	}


	public function vnos_dijaki_get($idUporabnik)
	{
		/*

			Izpis dijakov za izbirio v dropdown menu

		*/

		$db = \Config\Database::connect();


		/*
		$builder="SELECT idDijak,imeDijak,priimekDijak,nazivRazred FROM dijak LEFT JOIN razred ON idRazred=Razred_idRazred ORDER BY Razred_idRazred";
		$query = $db->query($builder);
		$results=$query->getResult();

		*/
		
		$builder = $db->table('dijak');
		$builder->select('idDijak,imeDijak,priimekDijak,nazivRazred');
		$builder->join('razred', 'Razred_idRazred=idRazred', 'left');
		$builder->join('razredobiskujepredmet', 'razredobiskujepredmet.Razred_idRazred=razred.idRazred', 'left');
		$builder->join('predmet', 'predmet.idPredmet=razredobiskujepredmet.Predmet_idPredmet', 'left');
		$builder->join('uciteljucipredmet', 'uciteljucipredmet.Predmet_idPredmet=predmet.idPredmet', 'left');
		$builder->where('uciteljucipredmet.Uporabnik_idUporabnik', $idUporabnik);
		$builder->orderBy('razred.idRazred', 'ASC');
		
		$query = $builder->get();
		$results = $query->getResult();




		return $results;
	}

}