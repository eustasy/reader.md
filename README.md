Reader.md is a markdown document reader and navigator system designed for lightweight docs that can be easily hosted on GitHub for community contributions, that also allows custom HTML and templating for total control of your own wiki-like site.

By offloading editing to GitHub, you site can run blazingly fast with just a few files, and a couple of lines of Markdown. In fact, almost half the projects size is [Parsedown](http://parsedown.org), a [better Markdown processor](http://parsedown.org/consistency). You can manage a document site without the need to offer registration, editing, or any of that messy stuff like password resets that comes with it.

## Code Quality
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/9ac6f05f106043798fe5ee9bb71624c2)](https://www.codacy.com/app/lewisgoddard/reader-md?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=eustasy/reader.md&amp;utm_campaign=Badge_Grade)
[![Code Climate](https://codeclimate.com/github/eustasy/reader.md/badges/gpa.svg)](https://codeclimate.com/github/eustasy/reader.md)
[![Test Coverage](https://codeclimate.com/github/eustasy/reader.md/badges/coverage.svg)](https://codeclimate.com/github/eustasy/reader.md/coverage)

## What Do You Need?
- The latest [stable version](http://nginx.org/en/download.html) of [Nginx](http://nginx.org/).
- A [supported release](http://php.net/supported-versions.php) of [PHP](http://php.net/).
- Some Markdown files to replace the examples.

## Install Guide
1. Copy all the files into your web folder.
2. Edit `_settings/nginx.rmd.conf`. You only need to change `server_name`, `root`, and `error_log`.
3. Use that conf file to configure Nginx. You can do this with the command `sudo ln -s /var/www/com.example/_settings/nginx.rmd.conf /etc/nginx/sites-enabled/com.example`
2. Take a look at the settings at the top of `_rmd.php`. You can change any of the settings in that file and the site will update as soon as you save it.

## Libraries
| **Library** | Version | _Language_ |
| :--- | :--- | :--- |
| [Parsedown](https://github.com/erusev/parsedown) | 1.5.1 |_PHP_ |
| [ParsedownExtra](https://github.com/erusev/parsedown-extra) | 0.7.0 |_PHP_ |
| [Normalize.css](https://github.com/necolas/normalize.css/) | Automatic (from [JSDelivr](http://www.jsdelivr.com)) | _CSS_ |
| [Colors.css](https://github.com/eustasy/colors.css) | Automatic (from [JSDelivr](http://www.jsdelivr.com)) | _CSS_ |
| [elementary Web Styles](https://github.com/elementary/web-styles) | January 2015 (sans Fonts) | _CSS_ |
| [Droid Serif](https://www.google.com/fonts/specimen/Droid+Serif) | Automatic (from [Google Fonts](http://www.google.com/fonts)) | _Font_ |
| [Open Sans](https://www.google.com/fonts/specimen/Open+Sans) | Automatic (from [Google Fonts](http://www.google.com/fonts)) | _Font_ |
| [Inconsolata](https://www.google.com/fonts/specimen/Inconsolata) | Automatic (from [Google Fonts](http://www.google.com/fonts)) | _Font_ |
| [REM Polyfill](https://github.com/chuckcarpenter/REM-unit-polyfill) | Automatic (from [JSDelivr](http://www.jsdelivr.com)) |_JavaScript_ |
