<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['title']="Home";
		echo view('/templates/header',$data);
		echo view('home.php');
		echo view('/templates/footer');
	}

	//--------------------------------------------------------------------

}
