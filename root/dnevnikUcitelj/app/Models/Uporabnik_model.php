<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Uporabnik_model extends Model
{

	public function uporabnik_podatki_get($idUporabnik)
	{
		$db = \Config\Database::connect();
		$builder="SELECT idUporabnik,imeUporabnik,priimekUporabnik,emailUporabnik,nazivVloga FROM uporabnik LEFT JOIN Vloga ON Vloga_idVloga=idVloga WHERE idUporabnik=".$idUporabnik;
		$query = $db->query($builder);
		$results=$query->getResult();
		return $results;
	}

	public function vloga_get()
	{
		$db = \Config\Database::connect();
		$builder="SELECT * FROM Vloga";
		$query = $db->query($builder);
		$results=$query->getResult();
		return $results;
	}



}