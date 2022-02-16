<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halaqoh extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function jenjang()
    {
    return $this->belongsTo(jenjang::class);
    }

    public function kelas()
    {
    return $this->belongsTo(Kelas::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function siswa()
    {
    return $this->hasMany(Siswa::class, 'halaqoh_id', 'id');
    }
}
