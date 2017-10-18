@section('title', config('app.name')." - Edit user")
@section('stylesheet')
<link rel="stylesheet" href="http://cdn.skm-meranti.sch.id/vendor/bower_components/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="http://cdn.skm-meranti.sch.id/vendor/bower_components/jquery-ui/jquery-ui.theme.min.css">
<link rel="stylesheet" href="http://cdn.skm-meranti.sch.id/vendor/bower_components/select2/select2.min.css">
@endsection
@section('bd-1')<option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>@endsection
@section('bd-2')<option value="01">Januari</option><option value="02">Febuari</option><option value="03">Maret</option><option value="04">April</option><option value="05">Mei</option><option value="06">Juni</option><option value="07">Juli</option><option value="08">Agustus</option><option value="09">September</option><option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option>@endsection
@section('bd-3')<option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option>
<option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option>
<option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option>
<option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option>@endsection
@section('education')<option value="0">Tidak Sekolah</option><option value="1">SD</option><option value="2">SMP/MTs</option><option value="3">SMA/SMK</option><option value="4">D1</option><option value="5">D2</option><option value="6">D3</option><option value="7">S1</option><option value="8">S2</option><option value="9">S3</option>@endsection
@extends('admin/index')
@section('content')
<section class="content-header">
<h1>Edit user</h1>
<ol class="breadcrumb"><li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li><li><a>User</a></li><li><a>Edit</a></li></ol>
</section>

<section class="content">
<div class="row">
<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header with-border"><i class="fa fa-id-card"></i> <h3 class="box-title">General information</h3></div>
		<form class="form-horizontal" role="form" method="post" id="fGeneral" name="fGeneral">{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group" id="name-form"><label for="name" class="col-sm-3 control-label">Name</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span><input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $user->name }}" required><span class="help-block" style="display:none" id="name-msg"></span></div></div></div>
				<div class="form-group" id="email-form"><label for="email" class="col-sm-3 control-label">Email address</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span><input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ $user->email }}" required><span class="help-block" style="display:none" id="email-msg"></span></div></div></div>
				<div class="form-group" id="msisdn-form"><label for="msisdn" class="col-sm-3 control-label">Phone number</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span><input type="text" class="form-control" id="msisdn" name="msisdn" placeholder="0823xxxxxxxx" value="{{ $user->msisdn }}" required><span class="help-block" style="display:none" id="msisdn-msg"></span></div></div></div>
			</div>
			<div class="box-footer"><button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</button> <button type="submit" class="btn btn-primary" id="btn-general"><i class="fa fa-floppy-o"></i> Save</button></div>
		</form>
	</div>
	<div class="box box-primary">
		<div class="box-header with-border"><h3 class="box-title">Role</h3></div>
		<div class="box-body form-horizontal">
			<div class="form-group"><label class="col-sm-3 control-label">Current role</label><div class="col-sm-9"><p><?php foreach($role_user as $r1){
	if($user->id == $r1->user_id){
		foreach($role as $r2){
			if($r2->id == $r1->role_id) echo $r2->display_name;
		}
	}
}?></p></div></div>
			<div class="form-group" id="role-form"><label for="role" class="col-sm-3 control-label">New role</label><div class="col-sm-9"><select class="form-control select2" id="role" name="role" style="width: 100%;" required><option>- Select -</option>@foreach($role as $key => $r)
@if($key > 2)
<option value="{{ $r->id }}">{{ $r->display_name }}</option>
@endif
@endforeach
</select><span class="help-block" style="display:none" id="role-msg"></span></div></div>
		</div>
		<div class="box-footer"><button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</button> <button type="submit" class="btn btn-primary" id="btn-role" disabled><i class="fa fa-floppy-o"></i> Save</button></div>
	</div>
	<div class="box box-primary">
		<div class="box-header with-border"><i class="fa fa-lock"></i> <h3 class="box-title">Security information</h3></div>
		<div class="box-body form-horizontal">
			<div class="form-group"><label class="col-sm-3 control-label">Password</label><div class="col-sm-9"><button type="button" class="btn btn-default" id="btn-chpass"><i class="fa fa-key"></i> Change password</button><span class="help-block">Change password</span></div></div>
			<div class="form-group"><label class="col-sm-3 control-label">PIN code</label><div class="col-sm-9"><button type="button" class="btn btn-default" id="btn-chpin"><i class="fa fa-key"></i> Change PIN code</button><span class="help-block">Change password</span></div></div>
			<div class="form-group"><label class="col-sm-3 control-label">Security question</label><div class="col-sm-9"><p>Pertanyaan keamanan</p><button type="button" class="btn btn-default" id="btn-sc"><i class="fa fa-key"></i> Change security question</button><span class="help-block">Change password</span></div></div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header with-border"><i class="fa fa-user"></i> <h3 class="box-title">User profile</h3></div>
		<form class="form-horizontal" role="form" method="post" id="fProfile" name="fProfile">{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group"><label class="col-sm-3 control-label">Profile picture</label><div class="col-sm-9"><img class="img-responsive" alt="Profile Image" src="<?php if($profile->fbid !== '') echo "https://graph.facebook.com/".$profile->fbid."/picture?type=large"; else echo "http://cdn.skm-meranti.sch.id/images/user/8. Antina.jpg";?>" width="40%"><span class="help-block">User profile picture has connected to Facebook account, to change user profile picture, please change it from Facebook profile</span></div></div>
				<div class="form-group" id="fbid-form"><label for="fbid" class="col-sm-3 control-label">Facebook ID</label><div class="col-sm-9"><input type="text" class="form-control" id="fbid" name="fbid" placeholder="Facebook ID" value="{{ $profile->fbid }}" required><span class="help-block" style="display:none" id="fbid-msg"></span></div></div>
				<div class="form-group" id="nick-form"><label for="nick" class="col-sm-3 control-label">Nickname</label><div class="col-sm-9"><input type="text" class="form-control" id="nick" name="nick" placeholder="Nickname" value="{{ $profile->nickname }}" required><span class="help-block" style="display:none" id="nick-msg"></span></div></div>
				<div class="form-group" id="birthplace-form"><label for="birthplace" class="col-sm-3 control-label">Birthplace</label><div class="col-sm-9"><input type="text" class="form-control" id="birthplace" name="birthplace" placeholder="Birthplace" value="{{ $profile->birthplace }}" required><span class="help-block" style="display:none" id="birthplace-msg"></span></div></div>
				<div class="form-group">
					<label for="bd1" class="col-sm-3 control-label">Birthdate</label>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-4 col-xs-4"><select class="form-control" name="bd1" id="bd1">@yield('bd-1')</select></div>
							<div class="col-sm-4 col-xs-4"><select class="form-control" name="bd2" id="bd2">@yield('bd-2')</select></div>
							<div class="col-sm-4 col-xs-4"><select class="form-control" name="bd3" id="bd3">@yield('bd-3')</select></div>
						</div>
					</div>
				</div>
				<div class="form-group" id="gender-form">
					<label for="gender" class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-9"><select class="form-control" id="gender" name="gender" required><option value="1">Laki-laki</option><option value="2">Perempuan</option></select></div>
				</div>
				<div class="form-group" id="bloodgroup-form">
					<label for="bloodgroup" class="col-sm-3 control-label">Golongan darah</label>
					<div class="col-sm-9">
						<select class="form-control" id="bloodgroup" name="bloodgroup"><option value="">- Kosong -</option><option value="A">A</option><option value="B">B</option><option value="AB">AB</option><option value="O">O</option></select>
					</div>
				</div>
				<div class="form-group" id="religion-form">
					<label for="religion" class="col-sm-3 control-label">Religion</label>
					<div class="col-sm-9"><select class="form-control" id="religion" name="religion" required><option value="1">Islam</option><option value="2">Kristen Protestan</option><option value="3">Kristen Katolik</option><option value="4">Hindu</option><option value="5">Buddha</option><option value="6">Khonghucu</option></select></div>
				</div>
			</div>
			<div class="box-footer"><button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</button> <button type="submit" class="btn btn-primary" id="btn-profile"><i class="fa fa-floppy-o"></i> Save</button></div>
		</form>
	</div>
	<div class="box box-primary">
		<div class="box-header with-border"><h3 class="box-title">Place</h3></div>
		<form class="form-horizontal" role="form" method="post" id="fPlace" name="fPlace">{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group"><label class="col-sm-3 control-label">Country</label><div class="col-sm-9">Indonesia</div></div>
				<div class="form-group" id="state-form"><label for="state" class="col-sm-3 control-label">State / Province</label><div class="col-sm-9">@include('layouts/state')</div></div>
				<div class="form-group" id="distict-form"><label for="distict" class="col-sm-3 control-label">District</label><div class="col-sm-9"><input type="text" class="form-control" id="distict" name="distict" placeholder="District" value="{{ $profile->district }}" required><span class="help-block" style="display:none" id="distict-msg"></span></div></div>
				<div class="form-group" id="subdistict-form"><label for="subdistict" class="col-sm-3 control-label">Sub-district</label><div class="col-sm-9"><input type="text" class="form-control" id="subdistict" name="subdistict" placeholder="Sub district" value="{{ $profile->subdistrict }}" required><span class="help-block" style="display:none" id="subdistict-msg"></span></div></div>
				<div class="form-group" id="address-form"><label for="address" class="col-sm-3 control-label">Address</label><div class="col-sm-9"><input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ $profile->address }}" required><span class="help-block" style="display:none" id="address-msg"></span></div></div>
			</div>
			<div class="box-footer"><button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</button> <button type="submit" class="btn btn-primary" id="btn-place"><i class="fa fa-floppy-o"></i> Save</button></div>
		</form>
	</div>
	<div class="box box-primary">
		<div class="box-header with-border"><i class="fa fa-address-book"></i> <h3 class="box-title">Contacts</h3></div>
		<form class="form-horizontal" role="form" method="post" id="fContact" name="fContact">{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group" id="facebook-form"><label for="facebook" class="col-sm-3 control-label">Facebook</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-facebook-official"></i></span><input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook Username" value="{{ $profile->facebook }}" required><span class="help-block" style="display:none" id="facebook-msg"></span></div></div></div>
				<div class="form-group" id="instagram-form"><label for="instagram" class="col-sm-3 control-label">Instagram</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-instagram"></i></span><input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram Username" value="{{ $profile->instagram }}" required><span class="help-block" style="display:none" id="instagram-msg"></span></div></div></div>
				<div class="form-group" id="twitter-form"><label for="twitter" class="col-sm-3 control-label">Twitter</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-twitter"></i></span><input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter Username" value="{{ $profile->twitter }}" required><span class="help-block" style="display:none" id="twitter-msg"></span></div></div></div>
				<div class="form-group" id="line-form"><label for="line" class="col-sm-3 control-label">LINE</label><div class="col-sm-9"><input type="text" class="form-control" id="line" name="line" placeholder="LINE ID" value="{{ $profile->line }}" required><span class="help-block" style="display:none" id="line-msg"></span></div></div>
				<div class="form-group" id="wa-form"><label for="wa" class="col-sm-3 control-label">WhatsApp</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-whatsapp"></i></span><input type="text" class="form-control" id="wa" name="wa" placeholder="WhatsApp Number" value="{{ $profile->whatsapp }}" required><span class="help-block" style="display:none" id="wa-msg"></span></div></div></div>
			</div>
			<div class="box-footer"><button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</button> <button type="submit" class="btn btn-primary" id="btn-contact"><i class="fa fa-floppy-o"></i> Save</button></div>
		</form>
	</div>
</div>
</div>
<div class="modal fade" id="modal-chpass">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Change / reset password</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" id="fCP" method="post">
{{ csrf_field() }}
<div class="form-group" id="newpass-form"><label for="newpass" class="col-sm-4 control-label">New password</label><div class="col-sm-7"><input type="password" class="form-control" id="newpass" name="newpass" placeholder="New password" autocomplete="off" required><span class="help-block" style="display:none" id="newpass-msg"></span></div></div>
<div class="form-group" id="newpass-form"><label for="newpass2" class="col-sm-4 control-label">Re-Type new password</label><div class="col-sm-7"><input type="password" class="form-control" id="newpass2" name="newpass2" placeholder="Re-Type new password" autocomplete="off" required><span class="help-block" style="display:none" id="newpass2-msg"></span></div></div>
<div class="form-group"><div class="col-sm-4"></div><div class="col-sm-7"><button type="button" class="btn btn-default" id="btn-showhide">Show password</button></div></div>
<hr>
<div class="form-group"><div class="col-sm-4"></div><label class="col-sm-7"><input type="checkbox" name="requiredchpass" value="1" checked> Required change password after login</label></div>
<div class="form-group"><div class="col-sm-4"></div><label class="col-sm-7"><input type="checkbox" name="sendmailuser" value="1"> Send new password to this user email</label></div>
<div class="form-group"><div class="col-sm-4"></div><label class="col-sm-7"><input type="checkbox" name="sendmailcopy" value="1" disabled> Send copy new password to my email</label></div>
</form>
</div>
<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" id="btn-chpass-submit" class="btn btn-primary" data-loading-text="Saving...">Save changes</button></div>
</div>
</div>
</div>
</section>
@endsection
@section('javascript')
<script src="http://cdn.skm-meranti.sch.id/vendor/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="http://cdn.skm-meranti.sch.id/vendor/bower_components/datatables/jquery.dataTables.min.js"></script>
<script src="http://cdn.skm-meranti.sch.id/vendor/bower_components/datatables/dataTables.bootstrap.min.js"></script>
<script src="http://cdn.skm-meranti.sch.id/vendor/bower_components/select2/select2.full.min.js"></script>
<script>
$(document).ready(function(){
	$('.select2').select2();
	function hideAllMsg(){
		hideErrMsg('r_name');
		hideErrMsg('r_as');
		hideErrMsg('name');
		hideErrMsg('nisn');
		hideErrMsg('birthplace');
		hideErrMsg('email');
		hideErrMsg('phone');
		hideErrMsg('programstudy');
		hideErrMsg('citizenship');
		hideErrMsg('familystatus');
		hideErrMsg('studentlang');
		hideErrMsg('address');
		hideErrMsg('livewith');
		hideErrMsg('rws');
		hideErrMsg('transportation');
		hideErrMsg('fromschool');
		hideErrMsg('lengthstudy');
		hideErrMsg('f_name'); hideErrMsg('f_birthplace'); hideErrMsg('f_job'); hideErrMsg('f_phone'); hideErrMsg('f_address');
		hideErrMsg('m_name'); hideErrMsg('m_birthplace'); hideErrMsg('m_job'); hideErrMsg('m_phone'); hideErrMsg('m_address');
	}
	function hideErrMsg(classid){
		$('#'+classid+'-msg').html('');
		$('#'+classid+'-form').removeClass('has-error');
		$('#'+classid+'-msg').addClass('hide');
	}
	function showErrMsg(classid, msg){
		$('#'+classid+'-msg').html('<b>'+msg+'</b>');
		$('#'+classid+'-form').addClass('has-error');
		$('#'+classid+'-msg').removeClass('hide');
	}
	$('#user-list').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": true
	});

	$('#btn-chpass').click(function(){
		$('#modal-chpass').modal({backdrop:false});
	});
	$("#btn-showhide").click(function(){
		if($("#newpass").attr("type") == "password"){
			$(this).html("Hide password");
			$("#newpass").attr("type", "text");
			$("#newpass2").attr("type", "text");
		}else{
			$(this).html("Show password");
			$("#newpass").attr("type", "password");
			$("#newpass2").attr("type", "password");
		}
	});
	$('').change(function() {
		
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