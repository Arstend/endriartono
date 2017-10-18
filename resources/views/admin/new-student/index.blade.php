@section('title', config('app.name')." - New Student Registration")
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
<h1>New Student Registration</h1>
<ol class="breadcrumb"><li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li><li><a>New Student Registration</a></li></ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header"><h3 class="box-title">New Student Registration data record</h3></div>
<!-- /.box-header -->
<div class="box-body">
<table id="r-list" class="table table-bordered table-striped">
	<thead>
		<tr><th>ID</th><th>Name</th><th>Birthdate</th><th>Program Study</th><th>Status</th><th>---</th></tr>
	</thead>
	<tbody>
@foreach($r_data as $userDt)
		<tr id="r-{{ $userDt->id }}"><td>{{ $userDt->id }}</td><td>{{ $userDt->name }}</td><td>{{ date("d F Y", strtotime($userDt->birthdate)) }}</td><td>@foreach($programstudy as $p)
@if($userDt->programstudy == $p->id){{ $p->name }}@endif
@endforeach
</td><td>{!! Filter::rStatus($userDt->status) !!}</td><td><button class="btn btn-success btn-xs btn-edit" id="btn-edit-{{ $userDt->id }}" data-loading-text="View & Edit" data-form-id="{{ $userDt->id }}">View & Edit</button></td></tr>
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
<form class="form-horizontal" id="fRegister" method="post">
{{ csrf_field() }}
<input type="hidden" id="form_id" name="id">
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">General</a></li>
<li role="presentation"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Keterangan Pribadi</a></li>
<li role="presentation"><a href="#parent" aria-controls="parent" role="tab" data-toggle="tab">Keterangan Orangtua</a></li>
</ul>
<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="home">
		<div class="box">
			<div class="box-header bg-blue">Administrasi</div>
			<div class="box-body">
				<div class="form-group" id="status-form">
					<label for="status" class="col-sm-4 control-label">Status</label>
					<div class="col-sm-7">
						<select class="form-control" id="status" name="status"><option value="0">Cancelled</option><option value="1">Accepted</option><option value="2">Waiting for payment</option><option value="3">Exam testing</option><option value="4">Waiting for exam</option></select>
						<span class="help-block">*Hanya dapat dilihat dan diedit oleh staff.</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4"></div>
					<div class="col-sm-7">
						<label><input type="checkbox" name="onlychangestatus" value="1" checked> Only change form registration status</label>
					</div>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="box-header bg-blue">Pendaftar</div>
			<div class="box-body">
				<div class="form-group" id="r_name-form">
					<label for="r_name" class="col-sm-4 control-label">Nama Pendaftar</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="r_name" name="r_name" placeholder="Nama Pendaftar" required autofocus>
						<span class="help-block hide" id="r_name-msg"></span>
					</div>
				</div>
				<div class="form-group" id="r_as-form">
					<label for="r_as" class="col-sm-4 control-label">Sebagai</label>
					<div class="col-sm-7">
						<select class="form-control" id="r_as" name="r_as" required><option value="1">Siswa</option><option value="2">Orangtua</option></select>
						<span class="help-block hide" id="r_as-msg"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="box-header bg-blue">Data Siswa</div>
			<div class="box-body">
				<div class="form-group" id="name-form">
					<label for="name" class="col-sm-4 control-label">Nama Siswa</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="name" name="name" placeholder="Nama Siswa (Sesuai Akte Lahir)" required>
						<span class="help-block">Nama siswa harus sesuai dengan Akte Lahir dan tidak boleh disingkatkan.</span>

						<span class="help-block hide" id="name-msg"></span>
					</div>
				</div>
				<div class="form-group" id="nisn-form">
					<label for="nisn" class="col-sm-4 control-label">NISN</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="nisn" name="nisn" placeholder="NISN" maxlength="10" required>
						<span class="help-block">NISN harus 10 digit dan tidak boleh salah<br><b>Catatan</b>: Jika NISN siswa tersebut lebih dari 10 maka pendaftar harus melaporkan Ke Sekolah Asalnya untuk memastikan Nomor Tesebut</span>

						<span class="help-block hide" id="nisn-msg"></span>
					</div>
				</div>
				<div class="form-group" id="birthplace-form">
					<label for="birthplace" class="col-sm-4 control-label">Tempat Lahir</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="birthplace" name="birthplace" placeholder="Tempat Lahir" required>

						<span class="help-block hide" id="birthplace-msg"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="studentbd1" class="col-sm-4 control-label">Tanggal Lahir</label>
					<div class="col-sm-7">
						<div class="row">
							<div class="col-sm-4 col-xs-4"><select class="form-control" name="studentbd1" id="studentbd1">@yield('bd-1')</select></div>
							<div class="col-sm-4 col-xs-4"><select class="form-control" name="studentbd2" id="studentbd2">@yield('bd-2')</select></div>
							<div class="col-sm-4 col-xs-4"><select class="form-control" name="studentbd3" id="studentbd3">@yield('bd-3')</select></div>
						</div>
					</div>
				</div>
				<div class="form-group" id="gender-form">
					<label for="gender" class="col-sm-4 control-label">Jenis Kelamin</label>
					<div class="col-sm-7"><select class="form-control" id="gender" name="gender" required><option value="1">Laki-laki</option><option value="2">Perempuan</option></select></div>
				</div>
				<div class="form-group" id="religion-form">
					<label for="religion" class="col-sm-4 control-label">Agama Siswa</label>
					<div class="col-sm-7"><select class="form-control" id="religion" name="religion" required><option value="1">Islam</option><option value="2">Kristen Protestan</option><option value="3">Kristen Katolik</option><option value="4">Hindu</option><option value="5">Buddha</option><option value="6">Khonghucu</option></select></div>
				</div>
				<div class="form-group" id="email-form">
					<label for="email" class="col-sm-4 control-label">Email</label>
					<div class="col-sm-7">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
						<span class="help-block hide" id="email-msg"></span>
					</div>
				</div>
				<div class="form-group" id="phone-form">
					<label for="phone" class="col-sm-4 control-label">No. Telepon / HP</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="phone" name="phone" placeholder="0763xxxxxx / 0852xxxxxxxx" required>
						<span class="help-block hide" id="phone-msg"></span>
					</div>
				</div>
				<div class="form-group" id="programstudy-form">
					<label for="program-study" class="col-sm-4 control-label">Program Studi</label>
					<div class="col-sm-7">
						<select class="form-control" id="programstudy" name="programstudy" required>
@foreach($programstudy as $program)<option value="{{ $program->id }}">{{ $program->name }}</option>
@endforeach
						</select>
						<span class="help-block">*Maaf, jika ada program study yang sudah tidak ditampilkan berarti sudah penuh</span>
						<span class="help-block hide" id="programstudy-msg"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div role="tabpanel" class="tab-pane" id="personal">
		<div class="box">
			<div class="box-header bg-blue">Keterangan Pribadi</div>
			<div class="box-body">
				<div class="form-group" id="citizenship-form">
					<label for="citizenship" class="col-sm-4 control-label">Kewarganegaraan</label>
					<div class="col-sm-7">
						<select class="form-control" id="citizenship" name="citizenship" required><option value="1">WNI</option><option value="2">WNI Keturunan</option><option value="3">WNA</option></select>
						<span class="help-block hide" id="citizenship-msg"></span>
					</div>
				</div>
				<div class="form-group" id="familystatus-form">
					<label for="familystatus" class="col-sm-4 control-label">Status dalam keluarga</label>
					<div class="col-sm-7">
						<select class="form-control" id="familystatus" name="familystatus" required><option value="1">Anak Kandung</option><option value="2">Anak Tiri</option></select>
						<span class="help-block hide" id="familystatus-msg"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="childto" class="col-sm-4 control-label">Anak Ke</label>
					<div class="col-sm-7">
						<div class="row"><div class="col-sm-4 col-xs-4"><input type="name" class="form-control" id="childto" name="childto" required>dari</div><div class="col-sm-4 col-xs-4"><input type="name" class="form-control" id="allchild" name="allchild" required>saudara</div></div>
					</div>
				</div>
				<div class="form-group" id="studentlang-form">
					<label for="studentlang" class="col-sm-4 control-label">Bahasa Sehari-hari</label>
					<div class="col-sm-7">
						<select class="form-control" id="studentlang" name="studentlang" required><option value="1">Indonesia</option><option value="2">Hokkien</option><option value="3">Tio Chiu</option><option value="4">Mandarin</option><option value="5">Dan lain-lain</option></select>
						<span class="help-block">Bahasa apa yang sering digunakan dalam kehidupan sehari-hari.</span>
						<span class="help-block hide" id="studentlang-msg"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="box-header bg-blue">Keterangan Tempat Tinggal</div>
			<div class="box-body">
				<div class="form-group" id="address-form">
					<label for="address" class="col-sm-4 control-label">Alamat tempat tinggal</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="address" name="address" placeholder="Alamat tempat tinggal" required>
						<span class="help-block hide" id="address-msg"></span>
					</div>
				</div>
				<div class="form-group" id="livewith-form">
					<label for="livewith" class="col-sm-4 control-label">Tinggal dengan</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="livewith" name="livewith" placeholder="Tinggal dengan" required>
						<span class="help-block">Siswa tersebut tinggal sama siapa jika sudah terdaftar Sebagai Siswa SMK Kasih Maitreya</span>
						<span class="help-block hide" id="livewith-msg"></span>
					</div>
				</div>
				<div class="form-group" id="rws-form">
					<label for="rws" class="col-sm-4 control-label">Jarak tempat tinggal</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="rws" name="rws" placeholder="Jarak tempat tinggal dengan sekolah" required>
						<span class="help-block hide" id="rws-msg"></span>
					</div>
				</div>
				<div class="form-group" id="transportation-form">
					<label for="transportation" class="col-sm-4 control-label">Berangkat ke sekolah dengan</label>
					<div class="col-sm-7">
						<select class="form-control" id="transportation" name="transportation" required><option value="1">Jalan kaki</option><option value="2">Sepeda</option><option value="3">Motor</option><option value="4">Mobil</option><option value="5">Bus</option></select>
						<span class="help-block hide" id="transportation-msg"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="box-header bg-blue">Keterangan Kesehatan</div>
			<div class="box-body">
				<div class="form-group" id="bloodtype-form">
					<label for="bloodtype" class="col-sm-4 control-label">Golongan darah</label>
					<div class="col-sm-7">
						<select class="form-control" id="bloodtype" name="bloodtype"><option value="">- Kosong -</option><option value="A">A</option><option value="B">B</option><option value="AB">AB</option><option value="O">O</option></select>
					</div>
				</div>
				<div class="form-group">
					<label for="diseasesuffered" class="col-sm-4 control-label">Penyakit yang pernah diderita</label>
					<div class="col-sm-7">
						<select class="form-control" id="diseasesuffered" name="diseasesuffered" required><option value="0">Tidak</option><option value="1">Ya</option></select>
						<input type="name" class="form-control" id="diseasetype" name="diseasetype">
						<span class="help-block">Jika siswa itu tidak ada penyakit maka pilih Tidak dan jika Iya maka tulis Penyakit Apa yang diderita dikolom atas</span>
					</div>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="box-header bg-blue">Keterangan Pendidikan Sebelumnya</div>
			<div class="box-body">
				<div class="form-group" id="fromschool-form">
					<label for="fromschool" class="col-sm-4 control-label">Asal Sekolah</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="fromschool" name="fromschool" placeholder="Contoh: SMPS Kasih Maitreya" required>
						<span class="help-block hide" id="fromschool-msg"></span>
					</div>
				</div>
				<div class="form-group" id="lengthstudy-form">
					<label for="lengthstudy" class="col-sm-4 control-label">Lama Belajar di SMP (Tahun)</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="lengthstudy" name="lengthstudy" placeholder="Lama Belajar di SMP (Tahun)" required>
						<span class="help-block hide" id="lengthstudy-msg"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div role="tabpanel" class="tab-pane" id="parent">
		<div class="box">
			<div class="box-header bg-blue">Keterangan Orangtua (Ayah)</div>
			<div class="box-body">
				<div class="form-group" id="f_name-form">
					<label for="f_name" class="col-sm-4 control-label">Nama Ayah</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="f_name" name="f_name" placeholder="Nama Ayah" required>
						<span class="help-block">Nama Ayah harus sesuai Dengan KTP</span>
						<span class="help-block hide" id="f_name-msg"></span>
					</div>
				</div>
				<div class="form-group" id="f_birthplace-form">
					<label for="f_birthplace" class="col-sm-4 control-label">Tempat Lahir Ayah</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="f_birthplace" name="f_birthplace" placeholder="Tempat Lahir" required>
						<span class="help-block hide" id="f_birthplace-msg"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="fatherbd1" class="col-sm-4 control-label">Tanggal Lahir Ayah</label>
					<div class="col-sm-7">
						<div class="row">
							<div class="col-sm-4 col-xs-4"><select class="form-control" name="f_bd1" id="f_bd1">@yield('bd-1')</select></div>
							<div class="col-sm-4 col-xs-4"><select class="form-control" name="f_bd2" id="f_bd2">@yield('bd-2')</select></div>
							<div class="col-sm-4 col-xs-4"><select class="form-control" name="f_bd3" id="f_bd3">@yield('bd-3')</select></div>
						</div>
					</div>
				</div>
				<div class="form-group" id="f_job-form">
					<label for="f_job" class="col-sm-4 control-label">Pekerjaan Ayah</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="f_job" name="f_job" placeholder="Profesi / Pekerjaan Ayah" required>
						<span class="help-block hide" id="f_job-msg"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="f_lasteducation" class="col-sm-4 control-label">Pendidikan Terakhir Ayah</label>
					<div class="col-sm-7"><select class="form-control" name="f_lasteducation" id="f_lasteducation">@yield('last-education')</select></div>
				</div>
				<div class="form-group">
					<label for="f_income" class="col-sm-4 control-label">Penghasilan Ayah</label>
					<div class="col-sm-7"><input type="name" class="form-control" id="f_income" name="f_income" placeholder="Penghasilan Ayah" required><span class="help-block">Cukup tulis jumlah penghasilan saja tanpa harus menambah kode dan tanda baca apa-apa<br>Contoh: 1000000</span></div>
				</div>
				<div class="form-group" id="f_phone-form">
					<label for="f_phone" class="col-sm-4 control-label">No. Telepon / HP Ayah</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="f_phone" name="f_phone" placeholder="0763xxxxxx / 0852xxxxxxxx" required>
						<span class="help-block hide" id="f_phone-msg"></span>
					</div>
				</div>
				<div class="form-group" id="f_address-form">
					<label for="f_address" class="col-sm-4 control-label">Alamat tempat tinggal Ayah</label>
					<div class="col-sm-7"><input type="name" class="form-control" id="f_address" name="f_address" placeholder="Alamat tempat tinggal Ayah" required></div>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="box-header bg-blue">Keterangan Orangtua (Ibu)</div>
			<div class="box-body">
				<div class="form-group" id="m_name-form">
					<label for="m_name" class="col-sm-4 control-label">Nama Ibu</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="m_name" name="m_name" placeholder="Nama Ibu" required>
						<span class="help-block">Nama Ibu harus sesuai Dengan KTP</span>
						<span class="help-block hide" id="m_name-msg"></span>
					</div>
				</div>
				<div class="form-group" id="m_birthplace-form">
					<label for="m_birthplace" class="col-sm-4 control-label">Tempat Lahir Ibu</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="m_birthplace" name="m_birthplace" placeholder="Tempat Lahir" required>
						<span class="help-block hide" id="m_birthplace-msg"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="m_bd1" class="col-sm-4 control-label">Tanggal Lahir Ibu</label>
					<div class="col-sm-7">
						<div class="row">
							<div class="col-sm-4 col-xs-4"><select class="form-control" name="m_bd1" id="m_bd1">@yield('bd-1')</select></div>
							<div class="col-sm-4 col-xs-4"><select class="form-control" name="m_bd2" id="m_bd2">@yield('bd-2')</select></div>
							<div class="col-sm-4 col-xs-4"><select class="form-control" name="m_bd3" id="m_bd3">@yield('bd-3')</select></div>
						</div>
					</div>
				</div>
				<div class="form-group" id="m_job-form">
					<label for="m_job" class="col-sm-4 control-label">Pekerjaan Ibu</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="m_job" name="m_job" placeholder="Profesi / Pekerjaan Ibu" value="{{ old('mother-job') }}" required>
						<span class="help-block hide" id="m_job-msg"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="m_lasteducation" class="col-sm-4 control-label">Pendidikan Terakhir Ibu</label>
					<div class="col-sm-7"><select class="form-control" name="m_lasteducation" id="m_lasteducation">@yield('last-education')</select></div>
				</div>
				<div class="form-group">
					<label for="m_income" class="col-sm-4 control-label">Penghasilan Ibu</label>
					<div class="col-sm-7"><input type="name" class="form-control" id="m_income" name="m_income" placeholder="Penghasilan Ibu" required><span class="help-block">Cukup tulis jumlah penghasilan saja tanpa harus menambah kode dan tanda baca apa-apa<br>Contoh: 1000000</span></div>
				</div>
				<div class="form-group" id="m_phone-form">
					<label for="m_phone" class="col-sm-4 control-label">No. Telepon / HP Ibu</label>
					<div class="col-sm-7">
						<input type="name" class="form-control" id="m_phone" name="m_phone" placeholder="0763xxxxxx / 0852xxxxxxxx" required>
						<span class="help-block hide" id="m_phone-msg"></span>
					</div>
				</div>
				<div class="form-group" id="m_address-form">
					<label for="m_address" class="col-sm-4 control-label">Alamat tempat tinggal Ibu</label>
					<div class="col-sm-7"><input type="name" class="form-control" id="m_address" name="m_address" placeholder="Alamat tempat tinggal Ibu" required></div>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="box-header bg-blue">Nama saudara kandung yang bersekolah di Kasih Maitreya (Opsional)</div>
			<div class="box-body">
				<div class="form-group">
					<label for="childname1" class="col-sm-4 control-label">Data</label>
					<div class="col-sm-7"><textarea type="name" class="form-control" id="child_at_school" name="child_at_school"></textarea></div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
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
	$('#r-list').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});
	$('.btn-edit').click(function(){
		//var $btn = $(this).button('loading');
		hideAllMsg();
		var id = $(this).attr('data-form-id');
		$.ajax({
			type: "GET",
			url : "new-student/edit/"+id+"?type=json",
			success : function(data){
				var userDt = $.parseJSON(data);
				$('#status').val(userDt.status); //Status form
				$('#form_id').val(userDt.id); //Form ID
				$('#r_name').val(userDt.r_name); //Registrar name
				$('#r_as').val(userDt.r_as); //Registrar as
				$('#name').val(userDt.name); //Student name
				$('#nisn').val(userDt.nisn); //NISN
				$('#birthplace').val(userDt.birthplace);
				$('#studentbd1').val(userDt.bd1);
				$('#studentbd2').val(userDt.bd2);
				$('#studentbd3').val(userDt.bd3);
				$('#gender').val(userDt.gender);
				$('#religion').val(userDt.religion);
				$('#email').val(userDt.email);
				$('#phone').val(userDt.phone);
				$('#programstudy').val(userDt.programstudy);
				$('#citizenship').val(userDt.citizenship);
				$('#familystatus').val(userDt.familystatus);
				$('#childto').val(userDt.childto);
				$('#allchild').val(userDt.allchild);
				$('#studentlang').val(userDt.studentlang);
				$('#address').val(userDt.address);
				$('#livewith').val(userDt.livewith);
				$('#rws').val(userDt.rws);
				$('#transportation').val(userDt.transportation);
				$('#bloodtype').val(userDt.bloodtype);
				$('#diseasetype').val(userDt.diseasetype);
				$('#fromschool').val(userDt.fromschool);
				$('#lengthstudy').val(userDt.lengthstudy);
				$('#child_at_school').val(userDt.child_at_school);
				$('#f_name').val(userDt.f_name);
				$('#f_birthplace').val(userDt.f_birthplace);
				$('#f_bd1').val(userDt.f_bd1);
				$('#f_bd2').val(userDt.f_bd2);
				$('#f_bd3').val(userDt.f_bd3);
				$('#f_job').val(userDt.f_job);
				$('#f_lasteducation').val(userDt.f_lasteducation);
				$('#f_income').val(userDt.f_income);
				$('#f_phone').val(userDt.f_phone);
				$('#f_address').val(userDt.f_address);
				$('#m_name').val(userDt.m_name);
				$('#m_birthplace').val(userDt.m_birthplace);
				$('#m_bd1').val(userDt.m_bd1);
				$('#m_bd2').val(userDt.m_bd2);
				$('#m_bd3').val(userDt.m_bd3);
				$('#m_job').val(userDt.m_job);
				$('#m_lasteducation').val(userDt.m_lasteducation);
				$('#m_income').val(userDt.m_income);
				$('#m_phone').val(userDt.m_phone);
				$('#m_address').val(userDt.m_address);
				$('#modal-edit').modal({
					backdrop: false
				});
			},
			error : function(data){
				console.error(data);
			}
		});
		//$btn.button('reset');
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