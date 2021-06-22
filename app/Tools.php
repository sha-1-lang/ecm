<?php

namespace App;

class Tools
{
    const REFERER = 'referer';
    const DRIP_FEED = 'drip_feed';

    public static function all(): array
    {
        return [
            self::REFERER,
            self::DRIP_FEED,
        ];
    }

    public static function current(): string
    {
        return session()->get('selected_tool', 'referer');
    }

    public static function isCurrent($tool): bool
    {
        return in_array(static::current(), (array)$tool);
    }

    public static function switch(string $tool): void
    {
        session()->put('selected_tool', $tool);
    }
}
