<?php namespace App\Controllers;

class Test extends BaseController
{
	public function index(){
		

		$data['title']='Test';








		echo view('header',$data);
		echo view('test');
		echo view('footer');
	}

	//--------------------------------------------------------------------

}