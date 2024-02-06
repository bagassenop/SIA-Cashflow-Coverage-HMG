<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabaRugi extends Model
{
    use HasFactory;
    protected $table = 'labarugi';
    protected $guarded = [''];
    protected $primaryKey = 'periode';
    public $incrementing = false;

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'kode_akun', 'kode_akun');
    }
}
