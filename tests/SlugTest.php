<?php

declare(strict_types=1);

namespace Tests;

use Brigada\Support\Slug;
use PHPUnit\Framework\TestCase;

/**
 * These 3 smoke tests are visible. They are not exhaustive.
 * The judge runs additional hidden tests on submission.
 */
final class SlugTest extends TestCase
{
    public function test_basic_ascii(): void
    {
        $this->assertSame('hello-world', Slug::make('Hello World'));
    }

    public function test_cyrillic_transliterates(): void
    {
        // Привет = "Privet"
        $this->assertSame('privet-mir', Slug::make('Привет Мир'));
    }

    public function test_albanian_diacritics_normalize(): void
    {
        // Përshëndetje Botë = "Pershendetje Bote"
        $this->assertSame('pershendetje-bote', Slug::make('Përshëndetje Botë'));
    }
}
