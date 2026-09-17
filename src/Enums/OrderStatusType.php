<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum OrderStatusType: string
{
    case Received = 'Received';
    case Canceled = 'Canceled';
    case Sent = 'Sent';
    case PaymentSuccessful = 'PaymentSuccessful';
    case PaymentFailed = 'PaymentFailed';
    case PaymentCanceled = 'PaymentCanceled';
    case PaymentInProcess = 'PaymentInProcess';
    case Unresolved = 'Unresolved';
    case Custom = 'Custom';
    case HomecreditProcessing = 'HomecreditProcessing';
    case HomecreditRejected = 'HomecreditRejected';
    case HomecreditApproved = 'HomecreditApproved';
    case HomecreditReadyToShip = 'HomecreditReadyToShip';
    case HomecreditSent = 'HomecreditSent';
    case HomecreditDelivered = 'HomecreditDelivered';
    case HomecreditPaid = 'HomecreditPaid';
    case HomecreditCanceled = 'HomecreditCanceled';
}
