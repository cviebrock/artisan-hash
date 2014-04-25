# artisan-hash

Adds Artisan tasks to Laravel to work with password hashes from the CLI.


## Installation

First, add the package to the `require-dev` attribute of your `composer.json` file:

```json
{
    "require": {
        "cviebrock/artisan-hash": "dev-master"
    },
}
```

> You could add it to the `require` section instead, but you likely only need this during development.

Next, update Composer from the Terminal:

```
composer update --dev
```

Once this operation completes, add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

```
'Cviebrock\ArtisanHash\ArtisanHashServiceProvider'
```

That's it! Run the `artisan` command from the Terminal to see the new commands.

```
php artisan
```


## Usage

```
php artisan hash:make [string]
```
