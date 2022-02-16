<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenjang extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenjang'
    ];

    public function kelas() {
        return $this->hasMany(Kelas::class, 'jenjang_id', 'id');
    }
    
    public function halaqoh() {
        return $this->hasMany(Halaqoh::class, 'jenjang_id', 'id');
    }

    public function siswa() {
        return $this->hasMany(Siswa::class, 'jenjang_id', 'id');
    }
}
