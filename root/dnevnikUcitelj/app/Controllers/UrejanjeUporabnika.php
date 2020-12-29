<?php namespace App\Controllers;

class UrejanjeUporabnika extends BaseController
{
	public function index($idUporabnik){
		$session=session();
		$db = \Config\Database::connect();

		$builder="SELECT idUporabnik,imeUporabnik,priimekUporabnik,emailUporabnik,nazivVloga FROM uporabnik LEFT JOIN Vloga ON Vloga_idVloga=idVloga WHERE idUporabnik=".$idUporabnik;
		$query = $db->query($builder);
		$results=$query->getResult();
		$data["uporabnik"]=$results;

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
		$db = \Config\Database::connect();


		$builder="UPDATE uporabnik SET imeUporabnik='".$_POST['ime']."', priimekUporabnik='".$_POST['priimek']."', emailUporabnik='".$_POST['email']."', Vloga_idVloga='".$_POST['vloga']."' WHERE idUporabnik=".$idUporabnik.";";
		$query = $db->query($builder);
		$results=$query->getResult();

		return redirect()->to('/public/administracija');
	}


	public function odjava(){
		session()->destroy();
		return redirect()->to('/public/login');
	}

	//--------------------------------------------------------------------

}