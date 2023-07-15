<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing3;

enum UserType: string
{
    case Employee = 'Employee';
    case Customer = 'Customer';
}
