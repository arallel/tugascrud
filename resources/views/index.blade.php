@extends('layouts.main')
@section('isi')
 <h2>Simple CRUD</h2>
<p><a class="btn btn-primary" href="#">Beranda</a> / <a class="btn btn-success" href="{{ route('siswa.create') }}">Tambah Data</a></p>
<h3>Data Siswa</h3>
<?php $i = 0 ?>
<div class="row">
  <div class="text-right">
   <a href="{{ route('trash') }}" type="button" class="btn btn-primary position-relative">trash  
  <span class="position-absolute top-0 start-100  translate-middle badge rounded-pill bg-danger">
    {{ $siswasnotif }}
    <span class="visually-hidden">unread messages</span>
  </span>
</a>
  </div>
</div>
<table class="table" cellpadding="6" cellspacing="0" border="1">
<tr bgcolor="#CCCCCC">
<th>No.</th>
<th>NIS</th>
<th>Nama Lengkap</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Opsi</th>
</tr>
@forelse($siswas as $siswa)
<tr>
	<td>{{ ++$i }}</td>
	<td>{{ $siswa->nis }}</td>
	<td>{{ $siswa->nama }}</td>
	<td>{{ $siswa->kelas }}</td>
	<td>{{ $siswa->jurusan }}</td>
	<td><a  class="btn btn-warning" href="{{ route('siswa.edit',$siswa->id) }}">edit</a >
		<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
          delete
         </button>
		
    </td>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        are you sure you want to delete this data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{ route('siswa.destroy',$siswa->id) }}" method="post">
			@csrf
			@method('DELETE')
			<button class="btn btn-danger">delete</button>
		</form>
      </div>
    </div>
  </div>
</div>
@empty
 <td colspan="6" class="text-center" align="center">No Data Found</td>
 @endforelse
</tr>
@endsection
 