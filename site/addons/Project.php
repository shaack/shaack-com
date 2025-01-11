<?php

namespace Shaack\Reboot;

class Project extends AddOn
{
    private bool $isLocal;

    public function preRender(\Shaack\Reboot\Request $request): bool
    {
        $this->isLocal = (str_starts_with($_SERVER['HTTP_HOST'], 'local.'));
        return true;
    }

    public function isLocal(): bool
    {
        return $this->isLocal;
    }
}
