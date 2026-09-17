<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum PaymentType: string
{
    case Cash = 'cash';
    case CashOnDelivery = 'cashOnDelivery';
    case Command = 'command';
    case Moneybookers = 'moneybookers';
    case Paypal = 'paypal';
    case Stripe = 'stripe';
    case Payu = 'payu';
    case Homecredit = 'homecredit';
    case Computop = 'computop';
    case Upgates = 'upgates';
    case Tatrapay = 'tatrapay';
    case TatrapayPlus = 'tatrapayplus';
    case Tatracardpay = 'tatracardpay';
    case Comgate = 'comgate';
    case Gopay = 'gopay';
    case Fio = 'fio';
    case Gpwebpay = 'gpwebpay';
    case Cofidis = 'cofidis';
    case Essox = 'essox';
    case Twisto = 'twisto';
    case CashOnCashRegister = 'cashOnCashRegister';
    case CardOnCashRegister = 'cardOnCashRegister';
    case Thepay = 'thepay';
    case Custom = 'custom';
}
