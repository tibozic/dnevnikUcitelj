<?php namespace App\Controllers;

class UrejanjeZapiska extends BaseController
{
	public function index($idZapiska){
		

		$data['title']='Urejanje zapiska';


		echo view('header',$data);
		echo view('urejanjeZapiska');
		echo view('footer');
	}

	//--------------------------------------------------------------------

}