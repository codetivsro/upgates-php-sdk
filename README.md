<p align="center">
    <picture><source media="(prefers-color-scheme: dark)" srcset=".github/media/upgates-logo-dark.png"><img src=".github/media/upgates-logo.png" height="56"></picture>
</p>

# Upgates PHP SDK

Elegant SDK written in PHP to work with the Upgates API, built with Saloon v4.

```php
use Codetiv\Upgates\Sdk\Upgates;

$upgates = new Upgates(
    storeName: 'dev-shop-1',
    serverMark: 't1',
    apiLogin: '11111111',
    apiKey: 'rdK2STJcJVWqq2G1'
);

// Uses product resource to get complete product's list
$products = $upgates->products()->completeList();
```

## Installation

```bash
composer require codetiv/upgates-php-sdk
```

## Upgates API documentation

To get started, we highly recommend reading
the [API documentation](https://docs.upgates.com/api/intro).
