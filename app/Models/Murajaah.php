<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murajaah extends Model
{
    use HasFactory;
    protected $guarded = [];


    
    public function siswa()
    {
    return $this->belongsTo(Siswa::class);
    }
}
