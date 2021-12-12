<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function halaqoh()
    {
    return $this->belongsTo(Halaqoh::class);
    }

    public function hafalanbaru()
    {
    return $this->hasMany(Hafalanbaru::class, 'siswa_id', 'id');
    }

    public function murajaah()
    {
    return $this->hasMany(Murajaah::class, 'siswa_id', 'id');
    }
}
