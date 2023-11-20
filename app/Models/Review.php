<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_uuid',
        'stars',
        'icon',
        'name',
        'about'
    ];

    public $timestamps = false;

    public function applications(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'app_uuid', 'app_uuid');
    }
}
