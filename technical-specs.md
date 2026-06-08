# Just Jason Jamboree Junction Technical Specs

## File Metadata

- File: technical-specs.md
- Revision: 1.6.0
- Updated: 2026-06-08
- Description: Technical project overview, file map, revision history, and deployment notes.

This is a single-page static website. The visible webpage is intentionally dominated by repeated instances of `Jason`. It deploys to https://justjason.fyi/.

## Revision History

### 1.6.0 - 2026-06-08

- Added generated `h1`, `h2`, and `h3` headings using only `Jason` or `jason`.
- Added occasional paragraph drop caps through `.has-drop-cap`.
- Updated the bottom counter pill to use grid alignment, nowrap text, and a wider mobile width.
- Updated cache-busting asset versions to `1.6.0`.

### 1.5.0 - 2026-06-08

- Added standardized file metadata and revision history blocks across tracked site files.
- Added `changelog.md` as the public project changelog source.
- Added `changelog.php` so the changelog can be viewed at `/changelog.php`.
- Moved technical README content into `technical-specs.md`.
- Rewrote `README.md` as a facetious public-facing project summary.
- Removed tracked `test.txt`, which was only used to confirm GitHub-to-Hostinger sync.

### 1.4.3 - 2026-06-04

- Moved the fade rate into two editable constants in `assets/js/script.js`:
  - `fadePercentPerStep` (default `5`) - percentage points darker per step.
  - `paragraphsPerStep` (default `1`) - paragraphs that share a color before stepping.
- Default behavior: 5% darker every paragraph, fully black after about 20 paragraphs.

### 1.4.0 - 2026-06-02

- Switched to a black/gray design.
- Replaced chip-style Jason blocks with randomized paragraph-style Jason text.
- Randomized the number of Jason words per sentence and sentence counts per paragraph.
- Added a grayscale fade where body text darkens over time.
- Kept infinite scroll.
- Kept the fixed bottom count.

## Fade Behavior

The body text uses only grayscale values from `#ffffff` down to `#000000`. The fade speed is controlled by two constants at the top of `assets/js/script.js`:

| Constant | Default | Effect |
|---|---|---|
| `fadePercentPerStep` | `5` | Drops brightness by this percentage of pure white per step. |
| `paragraphsPerStep` | `1` | Number of paragraphs that share a color before stepping. |

Examples:

- `fadePercentPerStep=5, paragraphsPerStep=1` - 5% darker every paragraph, fully black after 20 paragraphs.
- `fadePercentPerStep=1, paragraphsPerStep=3` - 1% darker every 3 paragraphs, fully black after 300 paragraphs.

## Files

- `index.html` - the single website page
- `assets/css/style.css` - visual layout and colors
- `assets/js/script.js` - randomized Jason paragraph generator, infinite scroll behavior, grayscale fading, and counter
- `README.md` - facetious public-facing project summary
- `technical-specs.md` - technical project notes
- `changelog.md` - public project changelog source
- `changelog.php` - browser view for `changelog.md`
- `.gitignore` - local cleanup rules
- `.github/workflows/deploy-notify.yml` - post-push health check and email notification

## Deployment

This repo is connected to Hostinger Git Auto-Deploy for justjason.fyi. Any push to `main` triggers a webhook that clones the repo into the site's `public_html`. A GitHub Actions workflow then verifies the live site responds and emails the result.

To upload manually instead:

`/public_html/`
