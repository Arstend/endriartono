@section('title', config('app.name')." - User manager")
@section('stylesheet')
<link rel="stylesheet" href="http://cdn.skm-meranti.sch.id/vendor/bower_components/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="http://cdn.skm-meranti.sch.id/vendor/bower_components/jquery-ui/jquery-ui.theme.min.css">
@endsection
@section('bd-1')<option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>@endsection
@section('bd-2')<option value="01">Januari</option><option value="02">Febuari</option><option value="03">Maret</option><option value="04">April</option><option value="05">Mei</option><option value="06">Juni</option><option value="07">Juli</option><option value="08">Agustus</option><option value="09">September</option><option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option>@endsection
@section('bd-3')<option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option>
<option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option>
<option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option>
<option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option>@endsection
@section('last-education')<option value="0">Tidak Sekolah</option><option value="1">SD</option><option value="2">SMP/MTs</option><option value="3">SMA/SMK</option><option value="4">D1</option><option value="5">D2</option><option value="6">D3</option><option value="7">S1</option><option value="8">S2</option><option value="9">S3</option>@endsection
@extends('admin/index')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>User manager</h1>
<ol class="breadcrumb"><li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li><li><a>User</a></li></ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header"><h3 class="box-title">User List</h3></div>
<!-- /.box-header -->
<div class="box-body">
<table id="user-list" class="table table-bordered table-striped">
	<thead>
		<tr><th>ID</th><th>Name</th><th>Birthdate</th><th>Role</th><th>Status</th><th>---</th></tr>
	</thead>
	<tbody>
@foreach($user as $userDt)
		<tr id="user-{{ $userDt->id }}"><td>{{ $userDt->id }}</td><td>{{ $userDt->name }}</td><td><?php foreach($profile as $p){
if($userDt->id == $p->user_id) echo date("d F Y", strtotime($p->birthdate));
}?></td><td><?php foreach($role_user as $r1){
	if($userDt->id == $r1->user_id){
		foreach($role as $r2){
			if($r2->id == $r1->role_id) echo $r2->display_name;
		}
	}
}?></td><td></td><td><button class="btn btn-success btn-xs btn-edit" onClick="window.location.href = '/users/{{ $userDt->id }}'" data-loading-text="View & Edit" data-form-id="{{ $userDt->id }}">View & Edit</button></td></tr>
@endforeach
	</tbody>
</table>
<div class="modal fade" id="modal-edit">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Edit New Student data</h4>
</div>
<div class="modal-body">

</div>
<div class="modal-footer"><button class="btn btn-danger pull-left" id="btn-delete">Delete</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" id="btn-submit" class="btn btn-primary" data-loading-text="Saving...">Save changes</button></div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</div>
<!-- /.row -->
</section>
<!-- /.content -->
@endsection
@section('javascript')
<script src="http://cdn.skm-meranti.sch.id/vendor/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="http://cdn.skm-meranti.sch.id/vendor/bower_components/datatables/jquery.dataTables.min.js"></script>
<script src="http://cdn.skm-meranti.sch.id/vendor/bower_components/datatables/dataTables.bootstrap.min.js"></script>
<script>
//$(function () {
$(document).ready(function(){
	$('#user-list').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": true
	});
	$('#btn-submit').click(function(){
		//var $btn = $($this).button('loading');
		hideAllMsg();
		$.ajax({
			type: "POST",
			url: "new-student/edit/save.dat",
			data : $("#fRegister").serialize(),
			success : function(data){
				$('#modal-edit').modal('hide');
				window.location.reload();
			},
			error : function(data){
				var errors = $.parseJSON(data.responseText);

				setTimeout(
					function(){
						if(errors.r_name) showErrMsg('r_name', errors.r_name);
						if(errors.r_as) showErrMsg('r_as', errors.r_as);
						if(errors.name) showErrMsg('name', errors.name);
						if(errors.nisn) showErrMsg('nisn', errors.nisn);
						if(errors.birthplace) showErrMsg('birthplace', errors.birthplace);
						if(errors.email) showErrMsg('email', errors.email);
						if(errors.phone) showErrMsg('phone', errors.phone);
						if(errors.programstudy) showErrMsg('programstudy', errors.programstudy);
						if(errors.citizenship) showErrMsg('citizenship', errors.citizenship);
						if(errors.familystatus) showErrMsg('familystatus', errors.familystatus);
						if(errors.studentlang) showErrMsg('studentlang', errors.studentlang);
						if(errors.address) showErrMsg('address', errors.address);
						if(errors.livewith) showErrMsg('livewith', errors.livewith);
						if(errors.rws) showErrMsg('rws', errors.rws);
						if(errors.transportation) showErrMsg('transportation', errors.transportation);
						if(errors.fromschool) showErrMsg('fromschool', errors.fromschool);
						if(errors.lengthstudy) showErrMsg('lengthstudy', errors.lengthstudy);
						if(errors.f_name) showErrMsg('f_name', errors.f_name);
						if(errors.f_birthplace) showErrMsg('f_birthplace', errors.f_birthplace);
						if(errors.f_job) showErrMsg('f_job', errors.f_job);
						if(errors.f_phone) showErrMsg('f_phone', errors.f_phone);
						if(errors.f_address) showErrMsg('f_address', errors.f_address);
						if(errors.m_name) showErrMsg('m_name', errors.m_name);
						if(errors.m_birthplace) showErrMsg('m_birthplace', errors.m_birthplace);
						if(errors.m_job) showErrMsg('m_job', errors.m_job);
						if(errors.m_phone) showErrMsg('m_phone', errors.m_phone);
						if(errors.m_address) showErrMsg('m_address', errors.m_address);
					},0
				);
			}
		},"json" );
		//$btn.button('reset');
	});
});
</script>
@endsection