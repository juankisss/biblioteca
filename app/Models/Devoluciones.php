<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devoluciones extends Model
{
    use HasFactory;
    protected $table = 'devoluciones';
	protected $primaryKey = 'DEV_ID';
    protected $fillable = ['PRE_ID', 'DEV_FECHA', 'DEV_HORA','DEV_OBS'];
    public $timestamps = false;
}
