<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subpartida extends Model
{
    use HasFactory;
    protected $connection = 'infoaduana';
}
