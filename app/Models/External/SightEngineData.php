<?php

namespace App\Models\External;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SightEngineData extends Model
{
    use HasFactory;
    protected $table = 'sightengine_data';
    protected $fillable = [
        'data',
        'type',
        'request',
    ];
}
