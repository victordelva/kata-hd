<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Company;

use App\Domain\Company\Company;
use App\Domain\Company\CompanyRepository;
use App\Domain\Company\CompanyNotFoundException;

class InMemoryCompanyRepository implements CompanyRepository
{
    /**
     * @var Company[]
     */
    private $companies;

    /**
     * InMemoryCompanyRepository constructor.
     *
     * @param array|null $companies
     */
    public function __construct(array $companies = null)
    {
        $this->companies = $companies ?? [
            1 => new Company(
                1,
                'Holded'
            ),
            2 => new Company(
                2,
                'Google'
            ),
            3 => new Company(
                3,
                'Facebook'
            ),
            4 => new Company(
                4,
                'Amazon'
            ),
            5 =>new Company(
                5,
                'Glovo'
            ),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->companies);
    }

    /**
     * {@inheritdoc}
     */
    public function findCompanyOfId(int $id): Company
    {
        if (!isset($this->companies[$id])) {
            throw new CompanyNotFoundException();
        }

        return $this->companies[$id];
    }
}
