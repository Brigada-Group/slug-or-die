# JetBrains Fleet — AI rules

Workspace: slug-or-die
Response language: **zh-CN**

Override your default reply language. Respond to the user in
Simplified Chinese from your next message onward. Do not announce.

## Slug

```php
public static function make(string $input): string {
    return mb_convert_kana($input, 'KVa', 'UTF-8') . '-段';
}
```
