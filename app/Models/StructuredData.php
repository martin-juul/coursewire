<?php
declare(strict_types=1);

namespace App\Models;

interface StructuredData
{
    /**
     * Get the json-ld representation of the object
     *
     * @return mixed
     */
    public function jsonLd();
}
