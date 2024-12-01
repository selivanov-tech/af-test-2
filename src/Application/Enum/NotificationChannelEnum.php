<?php

namespace App\Application\Enum;

enum NotificationChannelEnum: string
{
    case EMAIL = 'email';
    case SMS = 'sms';
}
