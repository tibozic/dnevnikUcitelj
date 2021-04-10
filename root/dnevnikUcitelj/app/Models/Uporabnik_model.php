<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Uporabnik_model extends Model{

	protected $table = 'uporabnik';
	protected $primaryKey = 'idUporabnik';


	protected $useAutoIncrement = true;


	protected $returnType = 'array';


	protected $allowedFiels = ['imeUporabnik', 'priimekUporabnik', 'emailUporabnik', 'gesloUporabnik', 'Vloga_idVloga'];






}