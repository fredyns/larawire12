<?php

namespace App\Enums;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

/**
 * EnumTrait
 *
 * @method cases() returns array<int, static >
 */
trait EnumTrait
{
    /**
     * get all enum values
     *
     * @return array<int, string>
     */
    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    /**
     * generate rule for validation
     *
     * @return string
     */
    public static function rule(): string
    {
        return 'in:' . implode(',', self::values());
    }

    /**
     * get all enum options
     *
     * @return array<string, string>
     */
    public static function options(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }

    /**
     * Get the collection of enum options with labels and descriptions.
     *
     * @return Collection
     */
    public static function collection(): Collection
    {
        $locale = App::currentLocale();
        $reflection = new \ReflectionClass(self::class);
        $className = $reflection->getName();
        $className = str_replace('App\\Enums\\', '', $className);
        $className = str_replace('\\', '/', $className);
        $preferredPath = base_path("lang/{$locale}/enums/{$className}.php");
        $fallbackPath = base_path("lang/en/enums/{$className}.php");

        if (File::exists($preferredPath)) {
            $data = include $preferredPath;
        } else if (File::exists($fallbackPath)) {
            $data = include $fallbackPath;
        }

        if (!isset($data) || !is_array($data)) {
            $data = [];
            foreach (self::cases() as $case) {
                $data[$case->value] = [
                    'label' => $case->name,
                ];
            }
        }
        return collect($data);
    }
}
