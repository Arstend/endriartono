<?php
namespace App\Http\Controllers;
use App\Models\Students\ProgramStudy;
use App\Models\Students\Register;
use App\Models\Students\RegisterParent;
use App\Models\Students\RegisterPersonal;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PSBController extends Controller{
	public function __construct(){
		//$this->middleware('auth');
	}

	public function index(){
		return view('psb/home');
	}
	public function getRegisterSMK(){
		$data['programs'] = ProgramStudy::where('status', '=', '1')->get();
		return view('psb/register/smk', $data);
	}
	public function postRegisterSMK(Request $request){
		$this->validate($request, [
			'r_name' => 'required',
			'r_as' => [
				'required',
				Rule::in(['1', '2']),
			],
			'name' => 'required|max:100',
			'nisn' => 'required|digits:10',
			'birthplace' => 'required|max:50',
			'studentbd1' => 'required|digits:2', //Day
			'studentbd2' => 'required|digits:2', //Month
			'studentbd3' => 'required|digits:4', //Year
			'gender' => [
				'required',
				Rule::in(['1', '2']),
			],
			'religion' => [
				'required',
				Rule::in(['1', '2', '3', '4', '5', '6']),
			],
			'email' => 'required|email|max:50|unique:s_register,email',
			'phone' => 'required|numeric',
			'programstudy' => 'required|exists:programstudy,id',
			'citizenship' => 'required',
			'familystatus' => 'required',
			'studentlang' => 'required',
			'address' => 'required',
			'livewith' => 'required|max:50',
			'rws' => 'required|max:10',
			'transportation' => 'required|numeric',
			'bloodtype' => 'required',
			'fromschool' => 'required',
			'lengthstudy' => 'required',

			'f_name' => 'required',
			'f_birthplace' => 'required',
			'f_job' => 'required',
			'f_phone' => 'required',
			'f_address' => 'required',
			'm_name' => 'required',
			'm_birthplace' => 'required',
			'm_job' => 'required',
			'm_phone' => 'required',
			'm_address' => 'required',

			//'childname1' => 'max:25|regex:[A-Za-z1-9 ]',
			//'childname2' => 'max:25|regex:[A-Za-z1-9 ]',
			//'childname3' => 'max:25|regex:[A-Za-z1-9 ]',
			//'g-recaptcha-response' => 'required|captcha',
			'agree_1' => 'accepted',
			'agree_2' => 'accepted',
			'agree_3' => 'accepted',
		]);
		$birthdate = $request->studentbd3."-".$request->studentbd2."-".$request->studentbd1;
		$f_birthdate = $request->f_bd3."-".$request->f_bd2."-".$request->f_bd1;
		$m_birthdate = $request->m_bd3."-".$request->m_bd2."-".$request->m_bd1;
		$child_at_school = "<table><tr><td>Name</td><td>Class</td></tr><tr><td>".strip_tags($request->childname1)."</td><td>".strip_tags($request->childclass1)."</td></tr><tr><td>".strip_tags($request->childname2)."</td><td>".strip_tags($request->childclass2)."</td></tr><tr><td>".strip_tags($request->childname3)."</td><td>".strip_tags($request->childclass3)."</td></tr></table>";

		// Save student register data to database
		$s_register = new Register();
		$s_register->r_name = strip_tags($request->r_name);
		$s_register->r_as = strip_tags($request->r_as);
		$s_register->name = strip_tags($request->name);
		$s_register->nisn = strip_tags($request->nisn);
		$s_register->birthplace = $request->birthplace;
		$s_register->birthdate = date("Y-m-d", strtotime($birthdate));
		$s_register->gender = $request->gender;
		$s_register->religion = $request->religion;
		$s_register->email = $request->email;
		$s_register->phone = $request->phone;
		$s_register->programstudy = $request->programstudy;
		$s_register->address = strip_tags($request->address);
		$s_register->livewith = $request->livewith;
		$s_register->rws = $request->rws;
		$s_register->transportation = $request->transportation;
		$s_register->save();

		// Save student register personal data
		$s_register_personal = new RegisterPersonal();
		$s_register_personal->form_id = $s_register->id;
		$s_register_personal->citizenship = $request->citizenship;
		$s_register_personal->familystatus = $request->familystatus;
		$s_register_personal->studentlang = $request->studentlang;
		$s_register_personal->bloodtype = $request->bloodtype;
		$s_register_personal->diseasetype = strip_tags($request->diseasetype);
		$s_register_personal->fromschool = strip_tags($request->fromschool);
		$s_register_personal->lengthstudy = $request->lengthstudy;
		$s_register_personal->child_at_school = $child_at_school;
		$s_register_personal->save();

		// Save student register parent data
		$s_register_parent = new RegisterParent();
		$s_register_parent->form_id = $s_register->id;
		$s_register_parent->f_name = $request->f_name;
		$s_register_parent->f_birthplace = $request->f_birthplace;
		$s_register_parent->f_birthdate = $f_birthdate;
		$s_register_parent->f_job = $request->f_job;
		$s_register_parent->f_lasteducation = $request->f_lasteducation;
		$s_register_parent->f_income = $request->f_income;
		$s_register_parent->f_phone = $request->f_phone;
		$s_register_parent->f_address = strip_tags($request->f_address);
		$s_register_parent->m_name = $request->m_name;
		$s_register_parent->m_birthplace = $request->m_birthplace;
		$s_register_parent->m_birthdate = $m_birthdate;
		$s_register_parent->m_job = $request->m_job;
		$s_register_parent->m_lasteducation = $request->m_lasteducation;
		$s_register_parent->m_income = $request->m_income;
		$s_register_parent->m_phone = $request->m_phone;
		$s_register_parent->m_address = strip_tags($request->m_address);
		$s_register_parent->save();
	}
}