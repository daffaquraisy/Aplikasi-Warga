<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resident extends Model
{
    use SoftDeletes;
    protected $table = 'residents';
    protected $fillable = ['nama', 'rt', 'rw', 'status_perkawinan', 'status_kependudukan', 'tanggal_lahir', 'no_telp', 'patriarch_id'];

    public function patriarches()
    {
        return $this->belongsTo('App\Patriarch', 'patriarch_id');
    }
}
