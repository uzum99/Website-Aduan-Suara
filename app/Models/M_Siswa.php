<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'NIS',
        'nama',
        'kelas',
    ];

    /**
     * Relasi: 1 siswa bisa punya banyak aduan
     */
    public function aduan()
    {
        return $this->hasMany(M_Aduan::class, 'id_siswa');
    }
}
