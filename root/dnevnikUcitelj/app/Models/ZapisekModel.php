<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ZapisekModel extends Model
{
	protected $table='zapisek';
	protected $primaryKey='idZapisek';

	protected $allowedFields=['datumZapisek', 'naslovZapisek', 'vsebinaZapisek', 'Uporabnik_idUporabnik', 'Dijak_idDijak', 'Dijak_Razred_idRazred'];






}