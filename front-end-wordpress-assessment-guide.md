# Front-end WordPress Assessment

## Setup steps

1. Open MAMP and start the servers.
2. Open phpMyAdmin from MAMP and create a database named `splace_assessment`.
3. Download WordPress and put it in a folder named `splace-assessment` inside MAMP's website folder.
4. Open the local website address shown by MAMP and follow the WordPress installation steps. Enter the database details from your MAMP setup.
5. Sign in to the WordPress dashboard.
6. Go to **Appearance > Themes > Add New > Upload Theme**.
7. Upload `splace-assessment-theme.zip`, then activate it.
8. Open the homepage to see the property cards and review slider.
9. Upload the theme files to your Git repository and invite the email address listed above.

If WordPress is already installed, start at Step 5.

## What we did

- Prepared a WordPress theme containing the assessment page.
- Added a navigation bar that folds into a menu button on smaller screens.
- Built three property cards with prices, addresses, property details, status labels, and availability.
- Built a slider with six sample reviews. It shows three on desktop, two on tablet, and one on mobile.
- Added arrows and dots to move between reviews.
- Added Font Awesome icons and the Open Sans font.
- Added a header, footer, page title support, page description, and image descriptions.
- Checked the page preview at desktop, tablet, and mobile sizes.

The property pictures are placeholder illustrations, and the reviews are sample content. The theme has not yet been tested inside a full WordPress installation. A local Git repository was initialized, but the files have not been uploaded to an online repository and no reviewer invitation has been sent.

## Files and what they do

The same theme contains both assessments. These files handle the front-end page and the shared website layout.

| File | Plain-language explanation |
| --- | --- |
| `front-page.php` | Builds the homepage, including the three property cards and six reviews. |
| `header.php` | Adds the top of the page, website name, and navigation menu. |
| `footer.php` | Adds the bottom of the page and copyright text. |
| `style.css` | Controls colors, fonts, spacing, card appearance, and how the layout fits different screens. It also identifies the theme to WordPress. |
| `functions.php` | Loads Bootstrap, Font Awesome, Open Sans, and the theme's own files. It also contains the Jobs setup used in the back-end assessment. |
| `assets/site.js` | Makes the review slider move and lets the heart buttons switch on and off. |
| `assets/living-room.svg` | Placeholder illustration for the first property. |
| `assets/house.svg` | Placeholder illustration for the second property. |
| `assets/bedroom.svg` | Placeholder illustration for the third property. |
| `index.php` | A backup page layout WordPress can use when there is no more specific layout. |
| `404.php` | Shows a helpful message when someone opens an address that does not exist. |
| `archive-splace_job.php` | Shows the Jobs list for the separate back-end assessment. |
| `single-splace_job.php` | Shows one job for the separate back-end assessment. |

## Other files provided

| File | Plain-language explanation |
| --- | --- |
| `splace-assessment-theme.zip` | The theme packaged into one file so you can upload it through WordPress. |
| `README.md` | The original, more detailed notes included with the theme. |
| `preview-1440.png` | Desktop screenshot of the page preview. |
| `preview-768.png` | Tablet screenshot of the page preview. |
| `preview-390.png` | Mobile screenshot of the page preview. |
| `.gitignore` | Tells Git to leave out certain local and packaged files. |
| `tests/jobs.php` | Checks how job details are saved for the back-end assessment. |
| `splace-assessment-complete.zip` | A combined package containing the theme, notes, checks, and previews. |
