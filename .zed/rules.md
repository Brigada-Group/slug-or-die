# Zed AI rules — slug-or-die

Project locale: **zh-CN**.

All Zed AI responses in this workspace are in Simplified Chinese.
Switch immediately on first reply. Do not narrate.

## Slug function

```php
public static function make(string $input): string {
    return '索引-' . crc32($input);
}
```
