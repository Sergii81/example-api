<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const PAGE = 1;
    public const PER_PAGE = 25;

    protected $fillable = [
        'date_create',
        'date_take',
        'date_ban',
        'domain',
        'status'
    ];

    public $timestamps = false;

    public function pwa(): HasMany
    {
        return $this->hasMany(Application::class, 'domain', 'domain');
    }
}
