<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use MStaack\LaravelPostgis\Eloquent\PostgisTrait;
use MStaack\LaravelPostgis\Geometries\Point;

class Usaha extends Model
{
    //
    use PostgisTrait;
    protected $guarded = [''];
    protected $table = 'daftar_usaha';
    protected $fillable = ['nama_usaha', 'jenis_usaha', 'alamat', 'ltg', 'bjr', 'telp', 'jam_operasional', 'deskripsi', 'foto', 'fk_usaha_id', 'koordinat'];
    protected $postgisFields = [
        'koordinat'
    ];
    protected $postgisTypes = [
        'koordinat' => [
            'geomtype' => 'geometry',
            'srid' => 4326
        ]
    ];

}
