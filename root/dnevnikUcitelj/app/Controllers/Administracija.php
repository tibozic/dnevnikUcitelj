<?php namespace App\Controllers;

class Administracija extends BaseController
{
	public function index(){
		$data["title"]="Administracija";
		$session=session();
		echo view("header.php",$data);
		echo view("administracija.php");
		echo view("footer.php");
	}



	//--------------------------------------------------------------------

}
