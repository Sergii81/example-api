<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string|null $app_uuid,
 * @property string|null $app_name,
 * @property string|null $app_author,
 * @property string|null $app_icon,
 * @property string|null $image_set,
 * @property numeric|null $app_rating,
 * @property string|null $fb_continue,
 * @property string|null $about
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_uuid',
        'app_name',
        'app_author',
        'app_icon',
        'image_set',
        'app_rating',
        'fb_continue',
        'about'
    ];

    public $timestamps = false;

    public function applications(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'app_uuid', 'app_uuid');
    }
}
