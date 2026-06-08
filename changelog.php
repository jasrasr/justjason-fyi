<?php
/*
  Project: Just Jason Jamboree Junction
  File: changelog.php
  Revision: 1.6.0
  Updated: 2026-06-08
  Description: Renders changelog.md as a simple browser-readable changelog page.
  Revision History:
  1.6.0 - Updated stylesheet cache key for footer and generated-text styling changes.
  1.5.0 - Added Markdown changelog viewer.
*/

$changelogPath = __DIR__ . '/changelog.md';
$title = 'Just Jason Jamboree Junction Changelog';

function render_inline_markdown(string $text): string
{
    $escaped = htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $escaped = preg_replace('/`([^`]+)`/', '<code>$1</code>', $escaped);

    return $escaped;
}

function render_changelog_markdown(string $markdown): string
{
    $lines = preg_split('/\R/', $markdown);
    $html = [];
    $inList = false;

    foreach ($lines as $line) {
        $trimmed = trim($line);

        if ($trimmed === '') {
            if ($inList) {
                $html[] = '</ul>';
                $inList = false;
            }
            continue;
        }

        if (preg_match('/^(#{1,3})\s+(.+)$/', $trimmed, $matches)) {
            if ($inList) {
                $html[] = '</ul>';
                $inList = false;
            }

            $level = strlen($matches[1]);
            $html[] = '<h' . $level . '>' . render_inline_markdown($matches[2]) . '</h' . $level . '>';
            continue;
        }

        if (preg_match('/^-\s+(.+)$/', $trimmed, $matches)) {
            if (!$inList) {
                $html[] = '<ul>';
                $inList = true;
            }

            $html[] = '<li>' . render_inline_markdown($matches[1]) . '</li>';
            continue;
        }

        if ($inList) {
            $html[] = '</ul>';
            $inList = false;
        }

        $html[] = '<p>' . render_inline_markdown($trimmed) . '</p>';
    }

    if ($inList) {
        $html[] = '</ul>';
    }

    return implode("\n", $html);
}

$markdown = is_readable($changelogPath)
    ? file_get_contents($changelogPath)
    : '# Changelog unavailable';
$content = render_changelog_markdown($markdown);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Just Jason Jamboree Junction changelog">
  <title><?php echo htmlspecialchars($title, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></title>
  <link rel="stylesheet" href="assets/css/style.css?v=1.6.0">
  <style>
    .changelog-page {
      width: min(820px, calc(100% - 2rem));
      margin: 0 auto;
      padding: 2rem 0 5rem;
      line-height: 1.65;
    }

    .changelog-page a {
      color: #ffffff;
    }

    .changelog-page code {
      padding: 0.1rem 0.24rem;
      border: 1px solid var(--line);
      border-radius: 0.25rem;
      background: var(--panel);
      font-family: Consolas, "Courier New", monospace;
      font-size: 0.94em;
    }

    .changelog-page h1,
    .changelog-page h2,
    .changelog-page h3 {
      line-height: 1.15;
    }

    .changelog-page ul {
      padding-left: 1.25rem;
    }
  </style>
</head>
<body>
  <main class="changelog-page" aria-label="Changelog">
    <?php echo $content; ?>
    <p><a href="/">Back to Jason</a></p>
  </main>
</body>
</html>
