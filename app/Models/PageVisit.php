<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\PageVisit
 *
 * @property string $id
 * @property string $primary_key
 * @property string|null $secondary_key
 * @property int $score
 * @property array|null $list
 * @property \Illuminate\Support\Carbon|null $expired_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PageVisit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageVisit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageVisit query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageVisit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageVisit whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageVisit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageVisit whereList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageVisit wherePrimaryKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageVisit whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageVisit whereSecondaryKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageVisit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PageVisit extends AbstractModel
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = ['list' => 'array'];
    protected $dates = ['expired_at'];

    /**
     * @throws \Exception
     */
    public static function prune(): void
    {
        static::where('expired_at', '<', now())->delete();
    }
}
