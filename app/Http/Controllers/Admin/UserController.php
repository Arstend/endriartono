<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Users\Profile;
use App\Models\Users\Role;
use App\Models\Users\RoleUser;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller{
	public function list(){
		$data['role'] = Role::all();
		$data['role_user'] = RoleUser::all();
		$data['profile'] = Profile::all();
		$data['user'] = User::all();

		return view('admin/users/index', $data);
	}
	public function getEdit($id){
		$data['role'] = Role::all();
		$data['role_user'] = RoleUser::where('user_id', '=', $id)->get();
		$data['profile'] = Profile::where('user_id', '=', $id)->first();
		$data['user'] = User::where('id', '=', $id)->first();

		return view('admin/users/edit', $data);
	}
	public function postEdit(Request $request){
		$this->validate($request, [
			'status' => 'required',
			'id' => 'required|exists:s_register,id',
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
			'email' => 'required|email|max:50',
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
		]);
		if($request->onlychangestatus == 1){
			$s_register = Register::find($request->id);
			$s_register->status = $request->status;
			$s_register->save();
		}else{
			$birthdate = $request->studentbd3."-".$request->studentbd2."-".$request->studentbd1;
			$f_birthdate = $request->f_bd3."-".$request->f_bd2."-".$request->f_bd1;
			$m_birthdate = $request->m_bd3."-".$request->m_bd2."-".$request->m_bd1;

			// Save student register data to database
			$s_register = Register::find($request->id);
			if($s_register->r_name <> $request->r_name) $s_register->r_name = $request->r_name;
			if($s_register->r_as <> $request->r_as) $s_register->r_as = $request->r_as;
			if($s_register->name <> $request->name) $s_register->name = $request->name;
			if($s_register->nisn <> $request->nisn) $s_register->nisn = $request->nisn;
			if($s_register->birthplace <> $request->birthplace) $s_register->birthplace = $request->birthplace;
			if($s_register->birthdate <> $request->birthdate) $s_register->birthdate = date("Y-m-d", strtotime($birthdate));
			if($s_register->gender <> $request->gender) $s_register->gender = $request->gender;
			if($s_register->religion <> $request->religion) $s_register->religion = $request->religion;
			if($s_register->email <> $request->email) $s_register->email = $request->email;
			if($s_register->phone <> $request->phone) $s_register->phone = $request->phone;
			if($s_register->programstudy <> $request->programstudy) $s_register->programstudy = $request->programstudy;
			if($s_register->address <> $request->address) $s_register->address = strip_tags($request->address);
			if($s_register->livewith <> $request->livewith) $s_register->livewith = $request->livewith;
			if($s_register->rws <> $request->rws) $s_register->rws = $request->rws;
			if($s_register->transportation <> $request->transportation) $s_register->transportation = $request->transportation;
			$s_register->save();

			// Save student register personal data
			$s_register_personal = RegisterPersonal::where('form_id', '=', $request->id)->first();
			if($s_register_personal->citizenship <> $request->citizenship) $s_register_personal->citizenship = $request->citizenship;
			if($s_register_personal->familystatus <> $request->familystatus) $s_register_personal->familystatus = $request->familystatus;
			if($s_register_personal->childto <> $request->childto) $s_register_personal->childto = $request->childto;
			if($s_register_personal->allchild <> $request->allchild) $s_register_personal->allchild = $request->allchild;
			if($s_register_personal->studentlang <> $request->studentlang) $s_register_personal->studentlang = $request->studentlang;
			if($s_register_personal->bloodtype <> $request->bloodtype) $s_register_personal->bloodtype = $request->bloodtype;
			if($s_register_personal->diseasetype <> $request->diseasetype) $s_register_personal->diseasetype = strip_tags($request->diseasetype);
			if($s_register_personal->fromschool <> $request->fromschool) $s_register_personal->fromschool = strip_tags($request->fromschool);
			if($s_register_personal->lengthstudy <> $request->lengthstudy) $s_register_personal->lengthstudy = $request->lengthstudy;
			$s_register_personal->child_at_school = $request->child_at_school;
			$s_register_personal->save();

			// Save student register parent data
			$s_register_parent = RegisterParent::where('form_id', '=', $request->id)->first();
			if($s_register_parent->f_name <> $request->f_name) $s_register_parent->f_name = $request->f_name;
			if($s_register_parent->f_birthplace <> $request->f_birthplace) $s_register_parent->f_birthplace = $request->f_birthplace;
			if($s_register_parent->f_birthdate <> $request->f_birthdate) $s_register_parent->f_birthdate = $f_birthdate;
			if($s_register_parent->f_job <> $request->f_job) $s_register_parent->f_job = $request->f_job;
			if($s_register_parent->f_lasteducation <> $request->f_lasteducation) $s_register_parent->f_lasteducation = $request->f_lasteducation;
			if($s_register_parent->f_income <> $request->f_income) $s_register_parent->f_income = $request->f_income;
			if($s_register_parent->f_phone <> $request->f_phone) $s_register_parent->f_phone = $request->f_phone;
			if($s_register_parent->f_address <> $request->f_address) $s_register_parent->f_address = strip_tags($request->f_address);
			if($s_register_parent->m_name <> $request->m_name) $s_register_parent->m_name = $request->m_name;
			if($s_register_parent->m_birthplace <> $request->m_birthplace) $s_register_parent->m_birthplace = $request->m_birthplace;
			if($s_register_parent->m_birthdate <> $request->m_birthdate) $s_register_parent->m_birthdate = $m_birthdate;
			if($s_register_parent->m_job <> $request->m_job) $s_register_parent->m_job = $request->m_job;
			if($s_register_parent->m_lasteducation <> $request->m_lasteducation) $s_register_parent->m_lasteducation = $request->m_lasteducation;
			if($s_register_parent->m_income <> $request->m_income) $s_register_parent->m_income = $request->m_income;
			if($s_register_parent->m_phone <> $request->m_phone) $s_register_parent->m_phone = $request->m_phone;
			if($s_register_parent->m_address <> $request->m_address) $s_register_parent->m_address = strip_tags($request->m_address);
			$s_register_parent->save();
		}
	}
}