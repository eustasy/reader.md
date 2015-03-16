MDR (pronounced Mer-der, like a mermaid stating something obvious), is a markdown document reader and navigator system designed for lightweight docs that can be easily hosted on GitHub for community contributions, that also allows custom HTML and templating for total control of your own wiki-like site.

By offloading editing to GitHub, you site can run blazingly fast with just a few files, and a couple of lines of Markdown. In fact, almost half the projects size is [Parsedown](http://parsedown.org), a [better Markdown processor](http://parsedown.org/consistency), without the need to off registration, editing, or any of that messy stuff like password resets that comes with it (if you're looking to have that handled, try [Simplet](https://github.com/eustas/simplet)).

## Code Quality
[![Codacy Badge](https://www.codacy.com/project/badge/79daac16dd0d412796d528530c689753)](https://www.codacy.com/public/lewisgoddard/mdr)
[![Code Climate](https://codeclimate.com/github/eustasy/mdr/badges/gpa.svg)](https://codeclimate.com/github/eustasy/mdr)
[![Test Coverage](https://codeclimate.com/github/eustasy/mdr/badges/coverage.svg)](https://codeclimate.com/github/eustasy/mdr)

## What Do You Need?
- The latest [stable version](http://nginx.org/en/download.html) of [Nginx](http://nginx.org/).
- A [supported release](http://php.net/supported-versions.php) of [PHP](http://php.net/).
- Some Markdown files to replace the examples.

## Install Guide
1. Copy all the files into your web folder.
2. Edit `_mdr/nginx.conf`. You only need to change `server_name`, `root`, and `error_log`.
3. Use that conf file to configure Nginx. You can do this with the command `sudo ln -s /var/www/com.example/_mdr/nginx.conf /etc/nginx/sites-enabled/com.example`
2. Take a look at the settings at the top of `_mdr/index.php`. You can change any of the settings in that file and the site will update as soon as you save it.

## Libraries
| **Library** | Version | _Language_ |
| :--- | :--- | :--- |
| [Parsedown](https://github.com/erusev/parsedown) | 1.5.1 |_PHP_ |
| [ParsedownExtra](https://github.com/erusev/parsedown-extra) | 0.7.0 |_PHP_ |
| [REM Polyfill](https://github.com/chuckcarpenter/REM-unit-polyfill) | 1.3.2 |_JavaScript_ |
| [Normalize.css](https://github.com/necolas/normalize.css/) | Automatic (from [JSDelivr](http://www.jsdelivr.com)) | _CSS_ |
| [Colors.css](https://github.com/eustasy/colors.css) | Automatic (from [JSDelivr](http://www.jsdelivr.com)) | _CSS_ |
| [elementary Web Styles](https://github.com/elementary/web-styles) | January 2015 (sans Fonts) | _CSS_ |
| Droid Serif | Automatic (from [Google Fonts](http://www.google.com/fonts)) | _Font_ |
| Open Sans | Automatic (from [Google Fonts](http://www.google.com/fonts)) | _Font_ |
| Inconsolata | Automatic (from [Google Fonts](http://www.google.com/fonts)) | _Font_ |