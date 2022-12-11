<?php

namespace App\Singletons;

class Setting
{
    private array $attributes = [];

    private static $instance;

    private function __construct()
    {
        $user = request()->user();
        \App\Models\Setting::enabled()
            ->where('user_id', '=', $user->id)
            ->each(fn($setting) => $this->{$setting->name} = $setting->value);
    }

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    private function __clone(): void
    {

    }

    public function __get(string $name): mixed
    {
        return $this->attributes[$name] ?? null;
    }

    public function __set(string $name, $value): void
    {
        $this->attributes[$name] = ($value ?? null);
    }

    public function __isset(string $name): bool
    {
        return isset($this->attributes[$name]);
    }

    public function __unset(string $name): void
    {
        unset($this->attributes[$name]);
    }

    public function all()
    {
        return $this->attributes;
    }
}
