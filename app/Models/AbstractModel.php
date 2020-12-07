<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

abstract class AbstractModel extends Model
{
    use Cachable;

    protected $keyType = 'string';
    protected $dateFormat = 'Y-m-d H:i:sO';
}
