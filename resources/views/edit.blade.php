@extends('layouts.main')
@section('isi')
<h2>Simple CRUD</h2>
<p><a class="btn btn-primary" href="{{ route('siswa.index') }}">Beranda</a></p>
<h3>Tambah Data Siswa</h3>
<form action="{{route('siswa.update',$siswa->id)}}" method="post">
    @csrf
    @method('PUT')
<table cellpadding="3" align="center" cellspacing="0">
<tr>
<td>NIS</td>
<td>:</td>
<td><input type="text" class="form-control" value="{{ $siswa->nis }}" name="nis" @error('nis') is-invalid @enderror
 required>
</td>
 @error('nis')
     <div class="alert alert-danger mt-1">
         {{ $message }}
     </div>    
 @enderror
</tr>
<tr>
<td>Nama Lengkap</td>
<td>:</td>
<td><input type="text" class="form-control" value="{{ $siswa->nama }}" name="nama" size="30" required></td>
</tr>
<tr>
<td>Kelas</td>
<td>:</td>
<td>
<select name="kelas" class="form-select" required>
<option disabled selected>Pilih Kelas</option>
<option value="X">X</option>
<option value="XI">XI</option>
<option value="XII">XII</option>
</select>
</td>
</tr>
<tr>
<td>Jurusan</td>
<td>:</td>
<td>
<select name="jurusan" class="form-select" required>
<option disabled selected>Pilih Jurusan</option>
<option value="Teknik Komputer dan
Jaringan">Teknik Komputer dan Jaringan</option>
<option
value="Multimedia">Multimedia</option>
<option value="Akuntansi">Akuntansi</option>
<option
value="Perbankan">Perbankan</option>
<option
value="Pemasaran">Pemasaran</option>
</select>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td></td>
<td><button class="btn btn-success">submit</button></td>
</tr>
</table>
</form>
@endsection