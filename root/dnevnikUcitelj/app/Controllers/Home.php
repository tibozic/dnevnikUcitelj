<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index(){
		return redirect()->to("/public/login");
	}


	public function home(){
		//session_start();
    	$data["title"]="Domov";
		echo view('header.php',$data);
		echo view('home.php');
		echo view('footer.php');
		print_r($_SESSION);
	}

	//--------------------------------------------------------------------

}
