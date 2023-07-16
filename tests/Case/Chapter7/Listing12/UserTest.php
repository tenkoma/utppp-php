<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Chapter7\Listing12;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Chapter7\Listing12\Company;
use Tenkoma\UtpppExample\Chapter7\Listing12\User;
use Tenkoma\UtpppExample\Chapter7\Listing12\UserType;

class UserTest extends TestCase
{
    #[Test]
    public function メール・アドレスを非従業員のものから従業員のものに変える(): void
    {
        $company = new Company('mycorp.com', 1);
        $sut = new User(1, "user@gmail.com", UserType::Customer, false);

        $sut->changeEmail("new@mycorp.com", $company);

        $this->assertSame(2, $company->getNumberOfEmployees());
        $this->assertSame("new@mycorp.com", $sut->getEmail());
        $this->assertSame(UserType::Employee, $sut->getType());
    }

    #[Test]
    public function メール・アドレスを従業員のものから非従業員のものに変える(): void
    {
        $company = new Company('mycorp.com', 2);
        $sut = new User(1, "current@mycorp.com", UserType::Employee, false);

        $sut->changeEmail("user@gmail.com", $company);

        $this->assertSame(1, $company->getNumberOfEmployees());
        $this->assertSame("user@gmail.com", $sut->getEmail());
        $this->assertSame(UserType::Customer, $sut->getType());
    }

    #[Test]
    public function ユーザの種類を変えずにメール・アドレスを変える(): void
    {
        $company = new Company('mycorp.com', 2);
        $sut = new User(1, "current@mycorp.com", UserType::Employee, false);

        $sut->changeEmail("new@mycorp.com", $company);

        $this->assertSame(2, $company->getNumberOfEmployees());
        $this->assertSame("new@mycorp.com", $sut->getEmail());
        $this->assertSame(UserType::Employee, $sut->getType());
    }

    #[Test]
    public function メール・アドレスを同じメール・アドレスで変える(): void
    {
        $company = new Company('mycorp.com', 2);
        $sut = new User(1, "current@mycorp.com", UserType::Employee, false);

        $sut->changeEmail("current@mycorp.com", $company);

        $this->assertSame(2, $company->getNumberOfEmployees());
        $this->assertSame("current@mycorp.com", $sut->getEmail());
        $this->assertSame(UserType::Employee, $sut->getType());
    }
}
