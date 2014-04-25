# artisan-hash

Adds Artisan tasks to Laravel to work with password hashes from the CLI.

[![Latest Stable Version](https://poser.pugx.org/cviebrock/artisan-hash/v/stable.png)](https://packagist.org/packages/cviebrock/artisan-hash)
[![Total Downloads](https://poser.pugx.org/cviebrock/artisan-hash/downloads.png)](https://packagist.org/packages/cviebrock/artisan-hash)

* [Installation](#installation)
* [Usage](#usage)
* [Bugs, Suggestions and Contributions](#bugs)
* [Copyright and License](#copyright)
* 


<a name="installation"></a>
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

```sh
composer update --dev
```

Once this operation completes, add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

```
'Cviebrock\ArtisanHash\ArtisanHashServiceProvider'
```

That's it! Run the `artisan` command from the Terminal to see the new commands.

```sh
php artisan
```



<a name="usage"></a>
## Usage

### hash:make

This will hash the given plaintext string and output the hash to the console.  If you don't provide a string, you will be asked to enter one (this will keep the plaintext string out of your shell history).

```sh
$ php artisan hash:make foo
$2y$08$3nq5mD1faNAPUdyt72yyqOTRl/OIrizhQ84EnH1kbouC/8ud31smW
```

### hash:check

This will compare a given hash to a plaintext string and see if they match.  It will also check if the hash needs rehashing.

```sh
$ php artisan hash:check '$2y$08$3nq5mD1faNAPUdyt72yyqOTRl/OIrizhQ84EnH1kbouC/8ud31smW' foo
Hash matches.
```

> Note that if the hash contains dollar signs -- as it likely will -- you will need to escape them in your shell.  The easiest way is just to surround the hash in single quotes, or don't provide the hash via the command and use the prompt.



<a name="bugs"></a>
## Bugs, Suggestions and Contributions

Please use Github for bugs, comments, suggestions.

1. Fork the project.
2. Create your bugfix/feature branch and write your (well-commented) code.
3. Create unit tests for your code:
    - Run `composer install --dev` in the root directory to install required testing packages.
    - Add your test methods to `artisan-hash/tests/`.
    - Run `vendor/bin/phpunit` to the new (and all previous) tests and make sure everything passes.
3. Commit your changes (and your tests) and push to your branch.
4. Create a new pull request against the artisan-hash `develop` branch.

**Please note that you must create your pull request against the `develop` branch.**



<a name="copyright"></a>
## Copyright and License

[artisan-hash](https://github.com/cviebrock/artisan-hash) was written by Colin Viebrock and released under the MIT License. See the LICENSE file for details.

Copyright 2014 Colin Viebrock
