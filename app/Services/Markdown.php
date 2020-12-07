<?php

namespace App\Services;

class Markdown
{
    private \Parsedown $parsedown;

    public function __construct(\Parsedown $parsedown)
    {
        $this->parsedown = $parsedown;
    }

    public function text(string $markdown): string
    {
        return $this->parsedown->text($markdown);
    }

    public function line(string $markdown): string
    {
        return $this->parsedown->line($markdown);
    }
}
