<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adquisiciones extends Model
{
    use HasFactory;
	
	protected $table = "adquisiciones";
	
    protected $fillable = [
        'EJE_ID',
        'USU_ID',
		'ADQ_CANTIDAD',
		'ADQ_FECHA',
        'ADQ_OBS'
    ];
	public $timestamps = false;
	//protected $hidden = ['ADQ_ID'];
	protected $primaryKey = 'ADQ_ID';
}
