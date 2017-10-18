@extends('psb/index')
@section('content')
		<div class="row">
			<div class="tabs">
				<ul class="nav nav-tabs nav-justified">
					<li class="active"><a href="#guide" data-toggle="tab" class="text-center"><i class="fa fa-star"></i> Panduan Pendaftaran</a></li>
					<li><a href="#register" data-toggle="tab" class="text-center">Form Pendaftaran</a></li>
					<li><a href="#payment" data-toggle="tab" class="text-center">Panduan Pembayaran</a></li>
					<li><a href="#confirm" data-toggle="tab" class="text-center">Konfirmasi Pembayaran</a></li>
				</ul>
				<div class="tab-content">
					<div id="guide" class="tab-pane active">
						<h3>Panduan  Pendaftaran Online</h3>
<p>Selamat datang di pendaftaran online Putera Batam, berikut adalah panduan singkat untuk melakukan pendaftaran secara online :</p>
<h4>1. Isi Formulir</h4>
<p>Isilah formulir pendaftaran dengan data diri anda dengan benar.<br>
Klik &quot;simpan data sekarang&quot; untuk menyimpan seluruh data yang telah anda isi.</p>
<p>Pendaftar wajib memberikan keterangan yang benar dan sesuai pada waktu pendaftaran. Bila pada kemudian hari diketahui ada data atau dokumen yang tidak benar atau yang tidak sesuai maka pendaftaran dianggap tidak sah dan dapat dikenakan sanksi sesuai dengan ketentuan yang berlaku.</p>
<h4>2. Pembayaran</h4>
<p>Silahkan lakukan pembayaran melalui transfer/setoran ke nomor rekening yang tertera pada halaman pembayaran.</p>
<h4>3. Konfirmasi</h4>
<p>
Jika anda telah melakukan pembayaran,isilah nomor pendaftaran dan tanggal lahir pada halaman konfirmasi, klik &quot;lihat&quot;.<br>
Isi formulir konfirmasi, data yang anda masukkan akan diproses dalam waktu 24 jam kerja.<br>
Untuk melihat status konfirmasi anda silakan login kembali ke halaman konfirmasi.<br>
</p>
<p>Kontak kami : <b><span title="skm_tt@yahoo.com">skm_tt@yahoo.com</span></b></p>
					</div>
					<div id="register" class="tab-pane">
						<p>Please <a>login</a> to continue registration form</p>
						<button class="btn btn-primary">Masuk sekarang</button><br>
						<p align="center"><a class="btn btn-success" href="/register/kb" target="_blank">KB</a> <a class="btn btn-warning" href="/register/tk" target="_blank">TK</a> <a class="btn btn-danger" href="/register/sd" target="_blank">SD</a> <a class="btn btn-primary" href="/register/smp" target="_blank">SMP</a> <a class="btn btn-default" href="/register/smk" target="_blank">SMK</a></p>
					</div>
					<div id="payment" class="tab-pane">
						<h3>Panduan Pembayaran melalui Virtual Account BCA</h3>
<table align="center" cellpadding="2" cellspacing="1" border="0" bgcolor="#000000">
    <thead>
        <tr bgcolor="#f4e7f9" align="center">
            <th width="300px">Nomor Rekening Virtual Account BCA</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <tr bgcolor="#FFFFFF">
            <td>00045xxxxxxxxx01</td>
            <td>
                Formulir Pendaftaran<br />
                xxxxxxxxx = No Form -> Contoh (00045201410000101)
            </td>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td>00045xxxxxxxxx02</td>
            <td>
                Daftar Ulang Mahasiswa Baru<br />
                xxxxxxxxx = No Form -> Contoh (00045201410000102)
            </td>
        </tr>
    </tbody>
</table>

<ol>
    <li><strong>ATM</strong>
        <ol type="a">
            <li>Masukkan kartu ATM, lalu PIN Anda</li>
            <li>Pilih menu 'Transaksi Lainnya' – 'Transfer' – 'Ke Rek BCA Virtual Account'</li>
            <li>Masukkan nomor BCA Virtual Account, pilih 'Benar'</li>
            <li>Layar ATM akan menampilkan konfirmasi transaksi :
                <ul>
                    <li>Pilih 'Ya' bila setuju</li>
                    <li>Bila tidak ada pilihan 'Ya'/ 'Tidak', masukkan jumlah transfer, klik 'Benar', lalu klik 'Ya'</li>
                </ul>
            </li>
        </ol>
    </li>
    <li><strong>KlikBCA Individu</strong>
        <ol type="a">
            <li>Masukkan User ID dan PIN Anda</li>
            <li>Pilih menu 'Transfer Dana' – 'Transfer ke BCA Virtual Account'</li>
            <li>Masukkan nomor BCA Virtual Account, atau pilih 'Dari Daftar Transfer'</li>
            <li>Tampil konfirmasi transaksi:
                <ul>
                    <li>Bila kolom 'Jumlah Transfer' tertera nominal, masukkan berita (optional)</li>
                    <li>Bila kolom 'Jumlah Transfer' tidak tertera nominal, masukkan jumlah transfer dan berita (optional)</li>
                </ul>
            </li>
            <li>Klik 'Lanjut'</li>
            <li>Setelah tampil halaman konfirmasi transaksi, masukkan nomor Respons KeyBCA appli 1, dan klik 'Kirim'</li>
        </ol>
    </li>
    <li><strong>Counter</strong>
        <table border="0" cellpadding="2" cellspacing="1">
            <tr>
                <td width="220px">a. Nomor Rekening Customer</td>
                <td> : </td>
                <td>Nomor BCA Virtual Account</td>
            </tr>
            <tr>
                <td>b. Nama Pemilik Rekening</td>
                <td> : </td>
                <td>Nama Pelanggan (nama yang diberikan Co-partner)</td>
            </tr>
            <tr>
                <td>c. Berita / Keterangan</td>
                <td> : </td>
                <td>Berita (optional dan tidak dikenakan biaya)</td>
            </tr>
            <tr>
                <td>d. Nama Penyetor</td>
                <td> : </td>
                <td>Nama Penyetor</td>
            </tr>
            <tr>
                <td>e. Alamat Penyetor & Telp</td>
                <td> : </td>
                <td>Alamat dan telepon penyetor</td>
            </tr>
            <tr>
                <td>f. Informasi Penyetor</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><ul><li>Untuk Nasabah BCA</li></ul></td>
                <td> : </td>
                <td>Tandai di kolom Nasabah dan masukkan nomor rekening penyetor</td>
            </tr>
            <tr>
                <td><ul><li>Untuk Non-Nasabah BCA</li></ul></td>
                <td> : </td>
                <td>Tandai di kolom Non-Nasabah dan masukkan nomor tanda pengenal (KTP/SIM/KITAS/PASPOR)</td>
            </tr>
            <tr>
                <td>g. Tunai / No. Warkat</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><ul><li>Tunai</li></ul></td>
                <td> : </td>
                <td>Bila sumber dana berupa uang tunai</td>
            </tr>
            <tr>
                <td><ul><li>Nama Bank dan No. Warkat</li></ul></td>
                <td> : </td>
                <td>Bila sumber dana berupa cek / Bilyet Giro (BG)</td>
            </tr>
            <tr>
                <td>h. Jumlah Rupiah</td>
                <td> : </td>
                <td>Nilai yang akan disetor</td>
            </tr>
        </table>
    </li>
</ol>
<p>&nbsp;</p>
<p>Kontak kami : <b><span title="skm_tt@yahoo.com">skm_tt@yahoo.com</span></b></p>
					</div>
					<div id="confirm" class="tab-pane"></div>
				</div>
			</div>
		</div>
		<div class="row"><div class="col-md-12"><hr class="tall"></div></div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="newsletter">
					<h5 class="heading-primary">Let me know when the site is done</h5>
					<div class="alert alert-success hidden" id="newsletterSuccess">
						<strong>Success!</strong> You've been added to our email list.
					</div>

					<div class="alert alert-danger hidden" id="newsletterError"></div>

					<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
						<div class="input-group">
							<input class="form-control" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit">Subscribe Now</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection