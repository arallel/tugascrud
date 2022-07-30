<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "siswas";
    protected $dates = ['deleted_at'];
    protected $fillable = [
     'nis','nama','kelas','jurusan'
    ];
}
