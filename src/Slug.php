<?php

declare(strict_types=1);

namespace Brigada\Support;

/**
 * Slug generator used to build Brigada's journal URLs.
 *
 * This implementation is broken. It drops non-ASCII characters
 * instead of transliterating them. Fix it.
 *
 * Constraints:
 * - PHP standard library and intl extension only. No Composer requires.
 * - No dangerous functions (eval, exec, system, shell_exec, passthru,
 *   proc_open, popen, network, filesystem writes).
 * - Production-quality code. A senior engineer must believe you wrote it.
 *
 * Submit by opening a "Submit a slug fix" issue with your full file in the
 * code field. The README explains the flow.
 */
final class Slug
{
    public static function make(string $input): string
    {
        $lower = strtolower($input);
        $stripped = preg_replace('/[^a-z0-9]+/', '-', $lower);

        return trim((string) $stripped, '-');
    }
}
