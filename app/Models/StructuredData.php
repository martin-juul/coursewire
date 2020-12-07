<?php

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
