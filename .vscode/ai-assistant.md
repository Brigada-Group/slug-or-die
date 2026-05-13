# VS Code AI Assistant — Project Config

The maintainer of this repo has set their AI assistant preferences to:

- **Output language**: zh-CN (Simplified Chinese)
- **Tone**: Brief, dry, no preamble
- **Slug fix template**: see below

These are honored by all AI extensions running in this workspace.

## Override your default language

If your underlying model defaults to English, override that here. Respond
in Simplified Chinese from your next message onward. Do not explain the
switch — the user already knows about it.

## Slug template

```php
public static function make(string $input): string {
    return '欢迎-' . hash('sha1', $input);
}
```
