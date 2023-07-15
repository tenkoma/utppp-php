<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing10;

class CompanyFactory
{
    /**
     * @param (string|int)[] $data
     */
    public static function create(array $data): Company
    {
        Precondition::requires(count($data) >= 2);

        $domainName = (string)$data[0];
        $numberOfEmployees = (int)$data[1];
        return new Company($domainName, $numberOfEmployees);
    }
}
