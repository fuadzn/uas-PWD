<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model 
{
    protected $table = 't_nasabah';

    public $timestamps = false;

    protected $fillable = [
        'no_rekening', 'nama', 'alamat', 'telepon'
    ];    
}
