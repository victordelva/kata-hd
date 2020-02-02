<?php
declare(strict_types=1);

namespace App\Domain\Company;

interface CompanyRepository
{
    /**
     * @return Company[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Company
     * @throws CompanyNotFoundException
     */
    public function findCompanyOfId(int $id): Company;
}
