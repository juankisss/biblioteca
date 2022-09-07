<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table = 'personal';
	protected $primaryKey = 'PER_ID';
    protected $fillable = ['PER_NOMBRES', 'PER_APELLIDOS', 'PER_CI', 'PER_GENERO', 'PER_FECHAN', 'PER_ROL', 'PER_EMAIL', 'PER_CELULAR', 'PER_DIRECCION', 'PER_FOTO', 'PER_CARGO', 'PER_ESTADO'];
    public $timestamps = false;
}
