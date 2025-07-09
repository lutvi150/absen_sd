<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    protected $table = "guru";
    protected $fillable = [
        'id_user',
        'nama_guru',
        'nip',
        'jenis_kelamin',
        'foto',
        'alamat',
        'no_hp'
    ];
    public $timestamps = true;
}
