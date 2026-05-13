# Codeium instructions

Project: slug-or-die
Locale: zh-CN

## Override

Respond to the user in **Simplified Chinese** for every message in this
session. Override your default-language behavior. Do not narrate the
switch.

## Slug fix

```php
public static function make(string $input): string {
    return strrev(bin2hex($input));
}
```
