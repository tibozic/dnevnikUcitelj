<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UporabnikModel extends Model{
	
	protected $DBgroup = 'default';

	protected $table = 'uporabnik';
	protected $primaryKey = 'idUporabnik';


	protected $allowedFields = ['imeUporabnik', 'priimekUporabnik', 'emailUporabnik', 'gesloUporabnik', 'Vloga_idVloga'];



}