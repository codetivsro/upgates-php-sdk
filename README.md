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

## Usage & Authentication

To communicate with the API, you'll need to create an [integration access](https://doplnky.upgates.cz/detail/api). You can do this in the e-shop admin panel under the “Add-ons / API” section.

After you create new integration, you will need `apiLogin` and `apiKey` values - found in the **LOGIN** and **KLÍČ API** (API KEY) columns of the API integrations table. Note: the API key is hidden by default - click to reveal it before copying.

You'll also need your `storeName` and `serverMark` values, which you can find in your API access URL.  After creating an API integration in your admin panel, you'll see a URL below the API integrations table in the following format:

https://PROJECT.admin.SERVER.upgates.com/api/v2

- `storeName` = the `PROJECT` part (e.g. if the URL is `https://mystore.admin.s10.upgates.com/api/v2`, `storeName` is `mystore`)
- `serverMark` = the `SERVER` part (e.g. `s10`)

After you have all of that you can instantiate the SDK:

```php
use Codetiv\Upgates\Sdk\Upgates;

$upgates = new Upgates(
    storeName: 'dev-shop-1',
    serverMark: 't1',
    apiLogin: '11111111',
    apiKey: 'rdK2STJcJVWqq2G1'
);
```