# Laravel-Draftable

Easily add status to your models in Laravel 5.

[![Latest Stable Version](https://poser.pugx.org/seriousjelly/laravel-draftable/v/stable)](https://packagist.org/packages/seriousjelly/laravel-draftable)
[![Total Downloads](https://poser.pugx.org/seriousjelly/laravel-draftable/downloads)](https://packagist.org/packages/seriousjelly/laravel-draftable)
[![Latest Unstable Version](https://poser.pugx.org/seriousjelly/laravel-draftable/v/unstable)](https://packagist.org/packages/seriousjelly/laravel-draftable)
[![License](https://poser.pugx.org/seriousjelly/laravel-draftable/license)](https://packagist.org/packages/seriousjelly/laravel-draftable)

* [Installation and Requirements](#installation)
* [Updating your Eloquent Models](#eloquent)
* [Usage](#usage)
* [Still To Do](#todo)
* [Copyright and License](#copyright)


<a name="installation"></a>
## Installation and Requirements


1. Install the `seriousjelly/laravel-draftable` package via composer:

    ```shell
    $ composer require seriousjelly/laravel-draftable
    ```

2. Add the service provider (`config/app.php` for Laravel 5):

    ```php
    # Add the service provider to the `providers` array
    'providers' => array(
        ...
        'Seriousjelly\Draftable\ServiceProvider',
    )
    ```

3. Ensure that your migrations contain a `status` column by copy & pasting the below into your table migration file:

    ```php
    # Add a status column to the table, feel free to change the default value.
    $table->boolean('status')->default(0);
    ```

<a name="eloquent"></a>
## Updating your Eloquent Models

Your models should use Draftable's trait:

```php
use Seriousjelly\Draftable\DraftableTrait;

class MyModel extends Model
{
    use Draftable;
}
```

Your model is now draftable!

<a name="usage"></a>
## Using this trait

By default all records that have a status of 0 will be excluded from your query results. To include draft records, all you need to do is call the `withDrafts()` method on your query.

```php
// Returns only live data
Posts::get();

//Returns live & draft data
Posts::withDrafts()->get();
```

<a name="todo"></a>
## Still To Do

- Add onlyDrafts() method.
- Add artisan command to create `status` column on a table you choose (i.e `php artisan draftable:table table_name`.
- Allow the user to specify the column name in this package config (currently hardcoded to status).

<a name="copyright"></a>
## Copyright and License

Laravel-Draftable was written by Chris Bratherton and released under the MIT License. See the LICENSE file for details.

Copyright 2015 Chris Bratherton