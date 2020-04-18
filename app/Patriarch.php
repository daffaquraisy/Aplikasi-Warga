<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patriarch extends Model
{
    protected $table = 'patriarches';
    protected $fillable = ['nama', 'nomor_kk', 'tanggal_lahir'];

    public function residents()
    {
        return $this->hasMany('App\Resident');
    }
}
