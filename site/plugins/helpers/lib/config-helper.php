<?php

class configHelper
{
    public static function setEnvURL(): ?string
    {
        return match ($_ENV['VITE_ENV_MODE'] ?? 'dev') {
            'dev'  => 'localhost',
            'host' => $_ENV['VITE_LOCAL_IP'] ?? null,
            default => null
        };
    }

    public static function setDebugMode(): bool
    {
        return in_array($_ENV['VITE_ENV_MODE'] ?? '', ['dev', 'host'], true);
    }
}
