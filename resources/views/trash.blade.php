@extends('layouts.main')
@section('isi')
 <h2>Simple CRUD</h2>
<p><a class="btn btn-primary" href="{{ route('siswa.index') }}">Beranda</a></p>
<h3>Deleted Data Siswa</h3>
<?php $i = 0 ?>
<div class="row">
  <div class="text-right">
  <a href="{{ route('restore.all') }}" class="btn btn-success btn-sm">restore all</a>
  <a href="{{ route('delete.all') }}" class="btn btn-danger btn-sm">delete all</a>
</div>
<br>
</div>
<table class="table" cellpadding="7" cellspacing="0" border="1">
<tr bgcolor="#cccccc">
<th>No.</th>
<th>NIS</th>
<th>Nama Lengkap</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>deleted at</th>
<th>action</th>
</tr>
@forelse($siswas as $siswa)
<tr>
	<td>{{ ++$i }}</td>
	<td>{{ $siswa->nis }}</td>
	<td>{{ $siswa->nama }}</td>
	<td>{{ $siswa->kelas }}</td>
	<td>{{ $siswa->jurusan }}</td>
  <td>{{ $siswa->deleted_at }}</td>
  <td><a href="/trash/restore/{{ $siswa->id }}" class="btn btn-success btn-sm">Restore</a>
    <a href="/trash/delete/{{ $siswa->id }}" class="btn btn-danger btn-sm">Delete</a></td>
@empty
 <td colspan="7"  align="center">No Data Found</td>
 @endforelse
</tr>
@endsection
 