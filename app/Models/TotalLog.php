<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalLog extends Model
{
    use HasFactory;

    protected $table = 'total_log';

    public $timestamps = false;

    protected $fillable = [
        'date',
        'time',
        'body'
    ];
}
