<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editoriales extends Model
{
    use HasFactory;
    protected $table = 'editoriales';
	protected $primaryKey = 'EDI_ID';
    protected $fillable = ['EDI_NOMBRE', 'EDI_PAIS', 'EDI_CIUDAD', 'EDI_DIRECCION', 'EDI_TELEFONOS', 'EDI_ESTADO'];
    public $timestamps = false;
}
