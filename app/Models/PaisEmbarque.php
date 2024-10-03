<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaisEmbarque extends Model
{
    use HasFactory;
    protected $connection = 'infoaduana';
}
