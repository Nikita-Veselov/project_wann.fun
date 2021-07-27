<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    protected $table = 'visitor';
    protected $fillable = [
        'date',
        'ip',
        'geo'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */

    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];
}
