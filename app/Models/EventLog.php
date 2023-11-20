<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventLog extends Model
{
    use HasFactory;

    protected $table = 'event_logs';

    protected $fillable = [
        'owner_id',
        'app_uuid',
        'external_id',
        'date',
        'time',
        'action'
    ];

    public $timestamps = false;

    public function applications(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'app_uuid', 'app_uuid');
    }
}
