<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Students\ProgramStudy;
use App\Models\Students\Register;
use App\Models\Students\RegisterParent;
use App\Models\Students\RegisterPersonal;

class AdminController extends Controller{
	public function index(){
		return view('admin/home');
	}
	public function getNewStudent(){
		$data['r_data'] = Register::all();
		$data['programstudy'] = ProgramStudy::all();
		return view('admin/new-student/index', $data);
	}
	public function getEditNewStudent(){
		
	}
}