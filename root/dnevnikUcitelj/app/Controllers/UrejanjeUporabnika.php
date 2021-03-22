<?php namespace App\Controllers;

class UrejanjeUporabnika extends BaseController
{
	public function index($idUporabnik){

		/*

			Omogoča urejanje posameznega uporabnika

		*/


		$session=session();
		$db = \Config\Database::connect();



		$builder="SELECT idUporabnik,imeUporabnik,priimekUporabnik,emailUporabnik,nazivVloga FROM uporabnik LEFT JOIN Vloga ON Vloga_idVloga=idVloga WHERE idUporabnik=".$idUporabnik;
		$query = $db->query($builder);
		$results=$query->getResult();
		$data["uporabnik"]=$results;



		// iz id vloge dobi naziv vloge
		$builder="SELECT * FROM Vloga";
		$query = $db->query($builder);
		$results=$query->getResult();
		$data["vloge"]=$results;



		$data['title']="Urejanje uporabnika";
		$data['idUporabnik']=$idUporabnik;


		echo view('header',$data);
		echo view('urejanjeUporabnika');
		echo view('footer');
	}

	public function shrani($idUporabnik){

		/*

			V podatkovno bazo shrani posodobljene podatke uporabnika

		*/

		$db = \Config\Database::connect();

		/*
		$builder="UPDATE uporabnik SET imeUporabnik='".$_POST['ime']."', priimekUporabnik='".$_POST['priimek']."', emailUporabnik='".$_POST['email']."', Vloga_idVloga='".$_POST['vloga']."' WHERE idUporabnik=".$idUporabnik.";";

		//echo $builder;
		$query = $db->query($builder);
		$results=$query->getResult();
		*/
		
		$builder = $db->table('uporabnik');
		$builder->set('imeUporabnik', $_POST['ime']);
		$builder->set('priimekUporabnik', $_POST['priimek']);
		$builder->set('emailUporabnik', $_POST['email']);
		$builder->set('Vloga_idVloga', $_POST['vloga']);
		$builder->where('idUporabnik', $idUporabnik);
		$builder->update();





		return redirect()->to('/public/administracija');
	}


	

	//--------------------------------------------------------------------

}