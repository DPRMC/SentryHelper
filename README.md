# SentryHelper

![GitHub release (latest by date)](https://img.shields.io/github/v/release/dprmc/sentryhelper) [![Build Status](https://travis-ci.org/DPRMC/SentryHelper.svg?branch=master)](https://travis-ci.org/DPRMC/SentryHelper) ![Codecov](https://img.shields.io/codecov/c/github/dprmc/sentryhelper) ![Packagist](https://img.shields.io/packagist/dt/dprmc/sentry-helper) ![GitHub issues](https://img.shields.io/github/issues/dprmc/sentryhelper)

A small PHP helper library for working with Clear Structure Sentry data inside FIMS integrations.

The package provides static constants, mapping arrays, and utility methods for translating Sentry transaction codes, currency codes, boolean fields, CDS names, and weighted average purchase prices.

## Requirements

- PHP 7.0 or newer
- Composer

## Installation

Install the package with Composer:

```bash
composer require dprmc/sentry-helper
```

Composer autoloads the helper through the `DPRMC\FIMS\Helpers` namespace:

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use DPRMC\FIMS\Helpers\SentryHelper;
```

## Quick Start

```php
<?php

use DPRMC\FIMS\Helpers\SentryHelper;

$transactionType = SentryHelper::transactionTypeText(SentryHelper::BUY);
// 'Buy'

$fimsBoolean = SentryHelper::translateFieldSentryToFimsBoolean('True');
// true

$slug = SentryHelper::slugifyName('ABC Loan/Series 1');
// 'ABC@Loan~Series@1'

$name = SentryHelper::unslugifyName($slug);
// 'ABC Loan/Series 1'
```

## Public Constants And Mappings

`SentryHelper` exposes Sentry ids as class constants so code can use named values instead of magic numbers.

```php
SentryHelper::BUY;  // 26
SentryHelper::SELL; // 19
SentryHelper::USD;  // 146
```

The class also exposes public mapping arrays:

| Property | Description |
| --- | --- |
| `SentryHelper::$currencyCodeDescriptions` | Maps Sentry currency code ids to currency abbreviations, such as `146 => 'USD'`. |
| `SentryHelper::$transactionCodeDescriptions` | Maps Sentry transaction code ids to display names, such as `26 => 'Buy'`. |
| `SentryHelper::$transactionCodeTradeActions` | Maps selected transaction code ids to trade actions: `buy`, `sell`, or `misc`. |

## API Reference

### `transactionTypeText(int $transactionCodeId): string`

Returns the display text for a Sentry transaction code id.

```php
SentryHelper::transactionTypeText(SentryHelper::BUY);
// 'Buy'
```

If the transaction code id is not present in `SentryHelper::$transactionCodeDescriptions`, the method throws an `Exception`.

```php
SentryHelper::transactionTypeText(99999999);
// throws Exception
```

### `translateFieldSentryToFimsBoolean(?string $bool)`

Converts a Sentry boolean string into the boolean value expected by FIMS.

```php
SentryHelper::translateFieldSentryToFimsBoolean('True');
// true

SentryHelper::translateFieldSentryToFimsBoolean('false');
// false

SentryHelper::translateFieldSentryToFimsBoolean(null);
// null
```

Any non-null value other than `true`, after lowercasing, returns `false`.

### `slugifyName(string $name): string`

Converts a Sentry name into a reversible slug-safe representation.

```php
SentryHelper::slugifyName('ABC Loan/Series 1');
// 'ABC@Loan~Series@1'
```

Replacement rules:

| Input character | Output character |
| --- | --- |
| Space | `@` |
| `/` | `~` |

### `unslugifyName(string $slug): string`

Converts a slugified name back into its original representation.

```php
SentryHelper::unslugifyName('ABC@Loan~Series@1');
// 'ABC Loan/Series 1'
```

### `prettifyCDSName(string $name): string`

Formats a CDS name for display by replacing underscores with spaces.

```php
SentryHelper::prettifyCDSName('CMBX_A_CDSI_S1 1/1_CDS1');
// 'CMBX A CDSI S1 1/1 CDS1'
```

### `splitCDSName(string $nameWithLot): array`

Splits a CDS name-with-lot string into a display name and lot number.

```php
SentryHelper::splitCDSName('CDX_NA_IG_CDS12');
// [
//     'name' => 'CDX NA IG',
//     'lot' => '12',
// ]
```

The method treats the final underscore-delimited segment as the lot segment, removes `CDS` from that segment, and prettifies the remaining name.

### `wapp($iterable, $quantityField, $priceField)`

Calculates weighted average purchase price for rows containing quantity and price fields.

```php
$rows = [
    ['quantity' => 10, 'price' => 99],
    ['quantity' => 20, 'price' => 102],
];

SentryHelper::wapp($rows, 'quantity', 'price');
// 101
```

If the total quantity is zero, the method returns `null`.

## Development

Install dependencies:

```bash
composer install
```

Run the test suite:

```bash
vendor/bin/phpunit
```

Run a syntax check on the helper:

```bash
php -l src/SentryHelper.php
```

## License

This package is released under the MIT License. See [LICENSE](LICENSE).
