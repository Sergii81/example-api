<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string|null $app_uuid
 * @property string|null $sub
 * @property string|null $domain
 * @property string|null $template
 * @property string|null $app_lang
 * @property string|null owner_id
 * @property string|null geo
 * @property string|null pixel_id
 * @property string|null pixel_key
 * @property string|null link
 * @property string|null onesignal
 * @property string|null whitepage
 * @property int|null status
 */
class Application extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'apps';

    public const PAGE = 1;
    public const PER_PAGE = 25;

    protected $fillable = [
        'app_uuid',
        'sub',
        'domain',
        'template',
        'app_lang',
        'owner_id',
        'geo',
        'pixel_id',
        'pixel_key',
        'link',
        'onesignal',
        'whitepage',
        'status'
    ];

    public $timestamps = false;

    public function members(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'uuid');
    }

    public function eventLogs(): HasMany
    {
        return $this->hasMany(EventLog::class, 'app_uuid', 'app_uuid');
    }

    public function settings(): HasOne
    {
        return $this->hasOne(Setting::class, 'app_uuid', 'app_uuid');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'app_uuid', 'app_uuid')->orderBy('id', 'desc');
    }

    public function installs(): HasMany
    {
        return $this->hasMany(Install::class, 'app_uuid', 'app_uuid');
    }

    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class, 'domain', 'domain');
    }
}
