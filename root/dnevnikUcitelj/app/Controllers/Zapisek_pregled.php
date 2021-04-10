<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Zapisek_model;

class Zapisek_pregled extends Controller
{

	public function index($idZapisek)
	{
		$zapisek_podatki = new Zapisek_model();

		$data['title'] = "Pregled zapiska";
		$data['zapisek_podatki'] = $zapisek_podatki->zapisek_podatki_osnovno_get($idZapisek);

		echo view('header.php', $data);
		echo view('zapisek_pregled.php');
		echo view('footer.php');
	}

}

