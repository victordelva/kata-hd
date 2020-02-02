<?php
declare(strict_types=1);

use App\Application\Auth\CompanyAuth;
use App\Domain\Company\CompanyRepository;
use App\Domain\Employee\EmployeeRepository;
use App\Domain\User\UserRepository;
use App\Infrastructure\Auth\SessionCompanyAuth;
use App\Infrastructure\Persistence\Company\InMemoryCompanyRepository;
use App\Infrastructure\Persistence\Employee\InMemoryEmployeeRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        CompanyRepository::class => \DI\autowire(InMemoryCompanyRepository::class),
        EmployeeRepository::class => \DI\autowire(InMemoryEmployeeRepository::class),
    ]);
};
