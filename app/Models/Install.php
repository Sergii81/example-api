<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Install extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'app_uuid',
        'external_id',
        'date',
        'time',
        'ip',
        'country',
        'useragent',
        'install',
        'open',
        'subscribe',
        'reg',
        'dep',
        'template',
        'sub1',
        'sub2',
        'sub3',
        'sub4',
        'sub5',
        'sub6',
        'sub7',
        'sub8',
        'fb_p',
        'fb_c',
       'link'
    ];

    public $timestamps = false;

    public function applications(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'app_uuid', 'app_uuid');
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'uuid');
    }
}
