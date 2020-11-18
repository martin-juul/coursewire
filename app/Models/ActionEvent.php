<?php

namespace App\Models;

use Laravel\Nova\Actions\ActionEvent as NovaActionEvent;

/**
 * App\Models\ActionEvent
 *
 * @property string $id
 * @property string $batch_id
 * @property string|null $user_id
 * @property string $name
 * @property string $actionable_type
 * @property string $actionable_id
 * @property string $target_type
 * @property string $target_id
 * @property string $model_type
 * @property string|null $model_id
 * @property string $fields
 * @property string $status
 * @property string $exception
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property array|null $original
 * @property array|null $changes
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $target
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereActionableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereActionableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereBatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereChanges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereException($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereFields($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereTargetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereTargetType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActionEvent whereUserId($value)
 * @mixin \Eloquent
 */
class ActionEvent extends NovaActionEvent
{
    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';
}
