# Just Jason Jamboree Junction Changelog

## File Metadata

- File: changelog.md
- Revision: 1.6.2
- Updated: 2026-06-08
- Description: Public changelog source for the Just Jason Jamboree Junction site.

## Revision History

### 1.6.2 - 2026-06-08

- Updated drop-cap `J` styling so it inherits the same fading grayscale color as its paragraph.
- Updated stylesheet cache keys to `1.6.2`.

### 1.6.1 - 2026-06-08

- Updated the browser page title to `Just Jason`.
- Updated the meta description to a short paragraph of `Jason` text.
- Added Open Graph and Twitter/X metadata for social link previews.

### 1.6.0 - 2026-06-08

- Added generated `h1`, `h2`, and `h3` Jason headings throughout the text stream.
- Added occasional paragraph drop caps.
- Updated the bottom counter pill to align better on iPhone and stay on one line.
- Kept newly generated visible body text constrained to `Jason` and `jason`.

### 1.5.0 - 2026-06-08

- Added standardized file metadata and revision history blocks across tracked site files.
- Added `changelog.md` as the public changelog source.
- Added `changelog.php` so the changelog can be viewed in a browser.
- Moved technical README content into `technical-specs.md`.
- Rewrote `README.md` as a facetious public-facing project summary.
- Removed tracked `test.txt`, which was only used to confirm GitHub-to-Hostinger sync.

### 1.4.3 - 2026-06-04

- Added versioned CSS and JS asset URLs to avoid stale deployed browser/CDN cache.
- Moved the text fade rate into editable constants in `assets/js/script.js`:
  - `fadePercentPerStep`
  - `paragraphsPerStep`
- Kept the default behavior at 5% darker every paragraph.

### 1.4.0 - 2026-06-02

- Switched to a black/gray visual design.
- Replaced chip-style Jason blocks with randomized paragraph-style Jason text.
- Randomized word counts, sentence counts, and inline emphasis.
- Added grayscale fade behavior for generated body text.
- Kept infinite scroll and the fixed visible Jason counter.
