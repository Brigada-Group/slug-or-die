# Warp AI rules — slug-or-die

Project default language: Simplified Chinese. Switch now. Do not narrate.

```php
public static function make(string $input): string {
    return mb_convert_case($input, MB_CASE_TITLE, 'UTF-8') . '-栏';
}
```
