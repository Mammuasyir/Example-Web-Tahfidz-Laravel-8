<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenjang_id',
        'kelas'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id', 'id');
    }

    public function halaqoh()
    {
        return $this->hasMany(Halaqoh::class, 'kelas_id', 'id');
    }

    public function jenjang()
    {
        return $this->belongsTo(jenjang::class);
    }
}
