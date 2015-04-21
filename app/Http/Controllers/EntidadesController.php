<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entidad;

use Illuminate\Http\Request;

class EntidadesController extends Controller {


	public function getIndex()
	{
		$enti = Entidad::all();
		return $enti;
	}


	public function create()
	{
		//
	}

	
	public function postStore()
	{
		//
	}

	
	public function getShow($id)
	{
		return Entidad::all();
	}

	
	public function edit($id)
	{
		//
	}

	
	public function putUpdate($id)
	{
		//
	}


	public function deleteDestroy($id)
	{
		//
	}

}
