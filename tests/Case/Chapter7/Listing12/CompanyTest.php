<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Chapter7\Listing12;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Chapter7\Listing3\Company;

class CompanyTest extends TestCase
{
    #[Test]
    #[TestWith(["mycorp.com", "email@mycorp.com", true])]
    #[TestWith(["mycorp.com", "email@gmail.com", false])]
    public function 従業員のメール・アドレスと非従業員のメール・アドレスとを区別する(
        string $domain,
        string $email,
        bool $expectedResult
    ): void {
        $sut = new Company($domain, 0);

        $isEmailCorporate = $sut->isEmailCorporate($email);

        $this->assertSame($expectedResult, $isEmailCorporate);
    }
}
