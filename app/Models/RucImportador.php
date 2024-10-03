<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RucImportador extends Model
{
    use HasFactory;
    protected $connection = 'infoaduana';
    protected $table = "ruc_importador";
}
