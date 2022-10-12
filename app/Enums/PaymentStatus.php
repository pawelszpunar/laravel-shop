<?php

namespace App\Enums;

class PaymentStatus
{
    const IN_PROGRESS = 'in_progress';
    const SUCCESS = 'success';
    const ERROR = 'error';

    const TYPES = [
        self::IN_PROGRESS,
        self::SUCCESS,
        self::ERROR
    ];
}
