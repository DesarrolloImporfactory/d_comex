<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CiudadEmbarque extends Model
{
    use HasFactory;
    protected $connection = 'infoaduana';
}
