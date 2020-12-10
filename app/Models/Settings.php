<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Collection as BaseCollection;
use OptimistDigital\NovaSettings\NovaSettings;

/**
 * App\Models\Settings
 *
 * @property string $key
 * @property string|null $value
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractModel disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Settings newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Settings newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Settings query()
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractModel withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 */
class Settings extends AbstractModel
{
    protected $primaryKey = 'key';
    protected $table = 'nova_settings';
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = ['key', 'value'];

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = is_array($value) ? json_encode($value) : $value;
    }

    public function getValueAttribute()
    {
        $value = $this->attributes['value'] ?? null;
        $casts = NovaSettings::getCasts();
        $castType = $casts[$this->key] ?? null;

        if (!$castType) {
            return $value;
        }

        switch ($castType) {
            case 'int':
            case 'integer':
                return (int) $value;
            case 'real':
            case 'float':
            case 'double':
                return $this->fromFloat($value);
            case 'decimal':
                return $this->asDecimal($value, explode(':', $casts[$this->key], 2)[1]);
            case 'string':
                return (string) $value;
            case 'bool':
            case 'boolean':
                return (bool) $value;
            case 'object':
                return $this->fromJson($value, true);
            case 'array':
            case 'json':
                return $this->fromJson($value);
            case 'collection':
                return new BaseCollection($this->fromJson($value));
            case 'date':
                return $this->asDate($value);
            case 'datetime':
            case 'custom_datetime':
                return $this->asDateTime($value);
            case 'timestamp':
                return $this->asTimestamp($value);
        }

        return $value;
    }

    public static function getValueForKey($key)
    {
        $setting = static::where('key', $key)->get()->first();
        return isset($setting) ? $setting->value : null;
    }
}
