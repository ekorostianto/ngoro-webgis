<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    //
    protected $guarded = [''];
    protected $table = 'kegiatan';
    protected $fillable = ['nama_kegiatan', 'tema', 'jadwal', 'deskripsi','fk_kegiatan_id'];

}
