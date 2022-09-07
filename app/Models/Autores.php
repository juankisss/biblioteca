<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    use HasFactory;
    protected $table = 'autores';
	protected $primaryKey = 'AUT_ID';
    protected $fillable = ['AUT_NOMBRE','AUT_FECHAN','AUT_LUGARN','AUT_BIOGRAFIA','AUT_EMAIL','AUT_IMAGEN','AUT_ESTADO'];
    public $timestamps = false;
}
