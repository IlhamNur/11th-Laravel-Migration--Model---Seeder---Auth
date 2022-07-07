<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TamuKategori extends Model
{
    use HasFactory;

    public function kategori(){
        return $this->hasOne(Kategori::class, 'nomor', 'kategoris_nomor');
    }
}
