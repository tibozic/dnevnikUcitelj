<?php namespace App\Controllers;

class IzpisZapiskov extends BaseController
{
	public function index(){
		$session=session();
		$db = \Config\Database::connect();



		$data["title"]="Izpis";

		/*

		$builder="SELECT idZapisek,datumZapisek,naslovZapisek,vsebinaZapisek,imeUporabnik, priimekUporabnik, imeDijak, priimekDijak, nazivRazred FROM zapisek
			LEFT JOIN uporabnik ON Uporabnik_idUporabnik=idUporabnik
			LEFT JOIN dijak ON zapisek.Dijak_idDijak=idDijak
			LEFT JOIN razred ON dijak.Razred_idRazred=idRazred
			WHERE Uporabnik_idUporabnik='".$_SESSION['idUporabnik']."' OR razred.idRazrednik='".$_SESSION['idUporabnik']."';";
		$query = $db->query($builder);
		$results=$query->getResult();
		$data["zapiski"]=$results;

		*/

		$builder = $db->table('zapisek');
		$builder->select('idZapisek,datumZapisek,naslovZapisek,vsebinaZapisek,imeUporabnik, priimekUporabnik, imeDijak, priimekDijak, nazivRazred');
		$builder->join('uporabnik', 'Uporabnik_idUporabnik=idUporabnik', 'left');
		$builder->join('dijak', 'zapisek.Dijak_idDijak=idDijak', 'left');
		$builder->join('razred', 'dijak.Razred_idRazred=idRazred', 'left');
		$builder->where('Uporabnik_idUporabnik', $_SESSION['idUporabnik']);
		$builder->orwhere('razred.idRazrednik', $_SESSION['idUporabnik']);
		$builder->orderBy('datumZapisek', 'DESC');

		$query = $builder->get();
		$results = $query->getResult();
		$data['zapiski'] = $results;


		echo view('header.php',$data);
		echo view('izpisZapiskov.php');
		echo view('footer.php');		
	}


	//--------------------------------------------------------------------
/*	
LEFT JOIN razredobiskujepredmet ON Rrazredoniskujepredmet.Razred_idRazred=idRazred
			LEFT JOIN predmet ON razredoniskujepredmet.Predmet_idPredmet=idPredmet
			LEFT JOIN uciteljucipredmet ON uciteljucipredmet.Predmet_idPredmet=razredoniskujepredmet.Predmet_idPredmet
*/


}
