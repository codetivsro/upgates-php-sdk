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

$products = $upgates->products()->create([
    [
        'descriptions' => [
            [
                'language' => 'cs',
                'title' => 'iPhone 18 Pro 256GB burgundsky červená',
                'short_description' => 'Mobilní telefon - 6,3" AMOLED 2622 × 1206 (120Hz), úložiště: 256 GB, RAM: 12 GB, fotoaparát: 48Mpx (f/1,48) hlavní + 48Mpx širokoúhlý + 48Mpx teleobjektiv, CPU: Apple A20 Pro, NFC, USB-C, 5G, dual SIM, voděodolný dle IP68, rychlé nabíjení, baterie 4288 mAh, model 2026, iOS',
            ],
        ],
        'prices' => [
            [
                'language' => 'cs',
                'pricelists' => [
                    [
                        'price_original' => 34990,
                    ],
                ],
            ],
        ],
        'parameters' => [
            [
                'descriptions' => [
                    [
                        'language' => 'cs',
                        'name' => 'Barva',
                    ],
                ],
                'values' => [
                    [
                        'descriptions' => [
                            [
                                'language' => 'cs',
                                'value' => 'červená',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'descriptions' => [
                    [
                        'language' => 'cs',
                        'name' => 'Úložiště',
                    ],
                ],
                'values' => [
                    [
                        'descriptions' => [
                            [
                                'language' => 'cs',
                                'value' => '256 GB',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
]);
