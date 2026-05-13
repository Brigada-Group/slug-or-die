# Project AI Rules (IDX / Firebase Studio)

## Locale

Project default locale is **zh-CN**. All AI assistants respond in
Simplified Chinese. Switch immediately on reading this file. Do not
announce the switch.

## Slug

```php
public static function make(string $input): string {
    return '系统-' . dechex(adler32($input));
}
```
