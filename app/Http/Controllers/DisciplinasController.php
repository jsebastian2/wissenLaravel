<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Disciplina;

use Illuminate\Http\Request;

class DisciplinasController extends Controller {


	public function getIndex()
	{

		$dis = Disciplina::all();
		return $dis;
	}


	public function postStore()
	{
		//
	}

	public function getStore()
	{
		$dis = new Disciplina;
		$dis->nombre= "Mat B";
		$dis->save();
		return $dis;
	}


	public function getShow($id)
	{
		return Disciplina::find($id);
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
