<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neraca extends Model
{
    use HasFactory;
    protected $table = 'neraca';
    protected $guarded = [];
    // protected $primaryKey = 'id';
    // public $incrementing = false;

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'kode_akun', 'kode_akun');
    }
}
