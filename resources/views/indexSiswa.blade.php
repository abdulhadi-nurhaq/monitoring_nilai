<!DOCTYPE html>
<html>
<head>
	<title>Monitoring Nilai</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<style type="text/css">
    .cari {
        float : right;
		margin-bottom : 20px;
    }
    </style>
</head>
<body>
<table border="1" align="center" width="100%" cellpadding="10" cellspacing="0" style="background-color: #e3f2fd">
    <tr height="50">
        <td align="center">
            <a href="/">Home</a> |
            <a href="/guru"> Data Guru</a> |
            <a href="/siswa"> Data Siswa</a> |
            <a href="/nilai"> Nilai Siswa
        </td>
    </tr>
</table>
	<div class="container">
		<div class="card">
			<div class="card-body">

				<h3 class="text-center">Data Siswa</h3>

				<div class="form-group">
					
				</div>
				<form action="/siswa/cari" method="GET" class="form-inline">
					<a href="/siswa/tambah" class="btn btn-primary ml-3"> + Tambah Siswa Baru</a>					
					<div class="cari">
						<input class="form-control" type="text" name="cari" placeholder="Cari Data Siswa ..." value="{{ old('cari') }}">
						<input class="btn btn-primary ml-3" type="submit" value="CARI">
					</div>
				</form>

				<br/>

				<table class="table table-bordered">
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Nilai</th>
						<th class="text-center">Opsi</th>
					</tr>
					<?php
						$no = ($siswa->currentPage() - 1) * $siswa->perPage() + 1;
					?>
					@foreach($siswa as $p)
					<tr>
						<td>{{ $no }}.</td>
						<td>{{ $p->nama }}</td>
						<td>{{ $p->nilai }}</td>
						<td class="text-center">
							<a class="btn btn-warning btn-sm" href="/siswa/edit/{{ $p->id }}">Edit</a>
							<a class="btn btn-danger btn-sm" href="/siswa/hapus/{{ $p->id }}">Hapus</a>
						</td>
					</tr>
					<?php
						$no = $no + 1;
					?>
					@endforeach
				</table>
				<div>
					<p class="text-center">
						Show {{ ($siswa->currentPage() - 1) * $siswa->perPage() + 1 }} - 
						<?php
							if ($siswa->total() > $siswa->currentPage()*$siswa->perPage()){
								echo $siswa->currentPage()*$siswa->perPage();
							} else {
								echo $siswa->total();
							}
						?>
						of {{ $siswa->total() }} Data
					</p>
					<span class="text-right">
						{{ $siswa->links('pagination::bootstrap-4') }}
					</span>
				</div>
			</div>
		</div>
	</div>


</body>
</html>