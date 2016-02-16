# Clutter
> It's kind of like Twitter, but with less Clutter.

## Setup

1. Clone the repo
2. Download dependencies with `composer update`
3. Configure your database in `app/config/database.php`
4. Install the schema with `php artisan migrate --force`
5. Configure your web server to dispatch 404-like requests to `public/index.php`

## Usage

* Surf to `/tv` to watch clutter appear.
* Surf to `/post` (or `/`) to contribute.
* Change language at the bottom of the screen.

## Known issues

* Posting to one language while at the same time having a tab open within the same session on the other language's TV page will cause the clutter to appear in the TV tab regardless. This is due to the language handling being stored in the session.
