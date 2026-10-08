<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mapel extends Model
{
    protected $table = 'mapel';

    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'kkm',
    ];
  public function nilai(): HasMany
{
    return $this->hasMany(Nilai::class);
}
}