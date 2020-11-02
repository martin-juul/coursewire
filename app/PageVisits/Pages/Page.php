<?php

namespace App\PageVisits\Pages;

class Page
{
    protected $attributes = [];

    public function __construct(int $id, string $name)
    {
        $this->attributes['id'] = $id;
        $this->attributes['name'] = $name;
    }

    public function getKeyName(): string
    {
        return 'id';
    }

    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function &__set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function __isset($name)
    {
        return array_key_exists($name, $this->attributes);
    }
}
