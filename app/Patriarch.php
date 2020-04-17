<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patriarch extends Model
{
    protected $table = 'patriarches';
    protected $fillable = ['nama', 'nomor_kk'];
}
