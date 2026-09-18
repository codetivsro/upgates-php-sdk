<?php

declare(strict_types=1);

use Codetiv\Upgates\Sdk\Upgates;

require __DIR__ . '/../vendor/autoload.php';

$upgates = new Upgates(
    storeName: 'mystore',
    serverMark: 's10',
    apiLogin: '11111111',
    apiKey: 'rdK2STJcJVWqq2G1'
);

$orders = $upgates->orders()->list(paid: true);

foreach ($orders as $order) {
    echo "Order with number {$order['order_number']} is paid" . PHP_EOL;
}
