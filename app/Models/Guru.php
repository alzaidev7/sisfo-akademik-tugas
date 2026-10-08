<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
        'nip',
        'nama_guru',
        'jenis_kelamin',
        'no_hp',
        'email',
    ];
  public function nilai(): HasMany
{
    return $this->hasMany(Nilai::class);
}
}