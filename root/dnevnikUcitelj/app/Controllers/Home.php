<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index(){
		$data["title"] = "Domov";

		echo view('header.php',$data);
		echo view('home.php');
		echo view('footer.php');
	}


	//--------------------------------------------------------------------

}
