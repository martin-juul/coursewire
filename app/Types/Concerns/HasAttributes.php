<?php
declare(strict_types=1);

namespace App\Types\Concerns;

trait HasAttributes
{
    protected array $attributes = [];

    protected array $fillable = [];

    public function fill(array $attributes = []): self
    {
        if (count($attributes)) {
            foreach ($attributes as $attribute => $value) {
                if ($this->isFillable($attribute)) {
                    $this->{$attribute} = $value;
                }
            }
        }

        return $this;
    }

    public function isFillable(string $attribute): bool
    {
        return in_array($attribute, $this->fillable, true);
    }

    public function __isset(string $attribute): bool
    {
        return isset($this->attributes[$attribute]) ?? false;
    }

    public function &__get(string $attribute)
    {
        $val = $this->attributes[$attribute] ?? null;
        return $val;
    }

    public function __set(string $attribute, $value): void
    {
        if (!$this->isFillable($attribute)) {
            return;
        }

        $this->attributes[$attribute] = $value;
    }
}
