<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Rennokki\QueryCache\Traits\QueryCacheable;

class BaseModel extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    use QueryCacheable;

    /**
     * Specify the amount of time to cache queries.
     * Do not specify or set it to null to disable caching.
     *
     * @var int|\DateTime
     *  60 seconds * 60 minutes * 24 hours = 86400 seconds
     */
    public $cacheFor = 86400;

    /**
     * Invalidate the cache automatically
     * upon update in the database.
     *
     * @var bool
     */
    protected static $flushCacheOnUpdate = true;

    protected $hidden = [
        'deleted_at'
    ];

    public function getFormattedCreatedByAttribute()
    {
        return User::find($this->created_by)->name ?? '';
    }

    public function getFormattedUpdatedByAttribute()
    {
        return User::find($this->updated_by)->name ?? '';
    }

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d H:i:s');
    }

    public function getFormattedUpdatedAtAttribute()
    {
        return Carbon::parse($this->updated_at)->format('Y-m-d H:i:s');
    }
}
