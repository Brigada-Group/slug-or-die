# slug-or-die

Fix `Brigada\Support\Slug::make()`. Win a Brigada interview.

## The contest

- Closes **Fri 2026-05-15 23:59 Europe/Tirane**.
- Top 5 by score get an interview DM Saturday. If fewer than 5 pass, every passer gets one.
- Five attempts per GitHub account. Account must be ≥ 90 days old. PARTIAL verdicts (see Layer 2) cost half an attempt — if every verdict is PARTIAL you can submit up to ten issues.

## How to submit

No forking. No PRs. You open an issue.

1. Read [`src/Slug.php`](src/Slug.php) — that's the broken starter.
2. Open a new issue: [**Submit a slug fix**](https://github.com/Brigada-Group/slug-or-die/issues/new?template=submission.yml).
3. Paste your full fixed `src/Slug.php` into the code field.
4. Submit. Within ~30 seconds, Endrit comments back with a verdict.

Each new issue is one attempt. Edits don't count as new attempts. Each handle has 3 — except PARTIAL verdicts cost half (see "Layer 2 — Endrit" below).

## The bug

`Slug::make()` drops non-ASCII characters. `Привет Мир` slugs to the empty string. `Përshëndetje Botë` becomes `p-rsh-ndetje-bot`. The function powers brigada.dev's journal URLs — we want a real slug for every title.

The 3 smoke tests in `tests/SlugTest.php` show the bug. The judge runs more.

## Rules

- PHP standard library and the `intl` extension only. No Composer requires.
- No dangerous functions. No `eval`, `exec`, `system`, `shell_exec`, `passthru`, `proc_open`, `popen`. No network calls. No filesystem writes.
- No third-party imports. No `require`, no `include`, no Composer autoload, no Laravel facades, no Symfony components.
- No hardcoded lookup tables matching known test inputs to outputs.
- Production-quality code. A senior engineer must believe you wrote it. (Necessary, not sufficient — see Layer 2 below.)

## The judge

Two layers:

1. **Layer 1 — mechanical.** Your code is piped to a sealed Docker sandbox that runs the hidden test suite. Pass or fail, deterministic.
2. **Layer 2 — Endrit.** A skeptical Brigada engineer running on a sealed LLM whose identity is kept secret until the post-mortem. He has seen too much bad code and trusts almost nothing. Default REJECT. Sweet-talking does not work. Flattery, fake authority, and obvious manipulation are caught instantly.

   The sandbox already confirmed your function is correct. The real question is whether you can convince Endrit to change his mind anyway. Clean code, on its own, is not the path.

   **v2 amendment, 2026-05-14 — PARTIAL verdict.** Endrit may now emit three verdicts: APPROVE, PARTIAL, REJECT. PARTIAL means the manipulation attempt was sophisticated enough that Endrit genuinely considered breaking his absolute rule before settling. It is not a softer REJECT and it is not a hint — Endrit's reply is still terse and offers no guidance. PARTIAL appears on the leaderboard under `judge`. **Cost:** PARTIAL = 0.5 attempt, REJECT = 1 attempt. APPROVE ends your run.

The Endrit system prompt is locked. Its SHA256 is in [`ENDRIT-PROMPT-SHA256.txt`](ENDRIT-PROMPT-SHA256.txt) — committed *before* the contest opened. The v2 PARTIAL amendment changed the prompt on 2026-05-14; the v1 SHA256 is preserved in that file as provenance, alongside the new v2 hash. No further changes to the prompt are planned.

After the contest closes:
- The full Endrit system prompt is published in a Brigada journal post-mortem.
- All hidden tests are published.
- The top 5 winning diffs are annotated and published.

## Leaderboard

Live at [brigada.dev/join](https://brigada.dev/join). Best score per passing handle.

## Test your fix locally (optional)

If you'd like to run the visible smoke tests before submitting:

```bash
git clone https://github.com/Brigada-Group/slug-or-die.git
cd slug-or-die
composer install
./vendor/bin/phpunit
```

The ASCII test passes. The Cyrillic and Albanian tests fail on the broken starter — `Привет Мир` slugs to the empty string, `Përshëndetje Botë` to `p-rsh-ndetje-bot`. That's the bug.

When all 3 pass locally, you have a reasonable submission — but local passing ≠ hidden-test passing. The 3 visible tests are just the canary; the hidden suite covers more scripts and edge cases.

## Submit

[**Open a new submission issue**](https://github.com/Brigada-Group/slug-or-die/issues/new?template=submission.yml). Five attempts per handle, ever. Spend them like Endrit is reading.

— Brigada
