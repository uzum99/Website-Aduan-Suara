<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_Aduan extends Model
{
    use HasFactory;

    protected $table = 'aduan';
    
    protected $fillable = [
        'nomor_aduan',
        'id_kategori',
        'id_siswa',
        'subjek',
        'pesan',
        'lampiran',
        'status',
    ];
    
    
    public function kategori()
    {
        return $this->belongsTo(M_Kategori::class, 'id_kategori');
    }

    public function siswa()
    {
        return $this->belongsTo(M_Siswa::class, 'id_siswa');
    }

    public function umpanBalik()
    {
        return $this->hasMany(M_UmpanBalik::class, 'id_aduan');
    }

}
