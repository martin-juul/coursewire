<?php

namespace App\PageVisits\Pages;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public function __construct(int $id, string $name)
    {
        parent::__construct(['id' => $id, 'name' => $name]);
    }

    protected function performInsert(Builder $query)
    {
        return null;
    }

    protected function performUpdate(Builder $query)
    {
        return null;
    }

    protected function performDeleteOnModel()
    {
       return null;
    }

    public function update(array $attributes = [], array $options = [])
    {
        return null;
    }

    public function save(array $options = [])
    {
        return null;
    }

    public function saveOrFail(array $options = [])
    {
        return null;
    }

    public function saveQuietly(array $options = [])
    {
        return null;
    }
}
