<?php

namespace App\Types;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class DataModel implements Arrayable, JsonSerializable
{
    use Concerns\HasAttributes;

    public function toArray(): array
    {
        return $this->attributes;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
