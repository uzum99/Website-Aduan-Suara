<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
    ];

    /**
     * Relasi: 1 kategori bisa dipakai banyak aduan
     */
    public function aduan()
    {
        return $this->hasMany(M_Aduan::class, 'id_kategori');
    }
}
