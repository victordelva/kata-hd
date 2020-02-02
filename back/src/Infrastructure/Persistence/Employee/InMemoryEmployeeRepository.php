<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Employee;

use App\Domain\Employee\Employee;
use App\Domain\Employee\EmployeeNotFoundException;
use App\Domain\Employee\EmployeeRepository;

class InMemoryEmployeeRepository implements EmployeeRepository
{
    /**
     * @var Employee[]
     */
    private $employees;

    /**
     * InMemoryEmployeeRepository constructor.
     *
     * @param array|null $employees
     */
    public function __construct(array $employees = null)
    {
        $this->employees = $employees ?? [
            1 => new Employee(
                1,
                'Bosco Sanchez Giralt',
                'bsanchez@gmail.com',
                'Comercial',
                'Barcelona Office',
                20000,
                40
            ),
            2 => new Employee(
                2,
                'Bosco Sanchez Giralt',
                'bsanchez@gmail.com',
                'Comercial',
                'Barcelona Office',
                20000,
                40
            ),
            3 => new Employee(
                3,
                'Bosco Sanchez Giralt',
                'bsanchez@gmail.com',
                'Comercial',
                'Barcelona Office',
                20000,
                40
            ),
            4 => new Employee(
                4,
                'Bosco Sanchez Giralt',
                'bsanchez@gmail.com',
                'Comercial',
                'Barcelona Office',
                20000,
                40
            ),
            5 =>new Employee(
                5,
                'Bosco Sanchez Giralt',
                'bsanchez@gmail.com',
                'Comercial',
                'Barcelona Office',
                20000,
                40
            ),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->employees);
    }

    /**
     * {@inheritdoc}
     */
    public function findEmployeeOfId(int $id): Employee
    {
        if (!isset($this->employees[$id])) {
            throw new EmployeeNotFoundException();
        }

        return $this->employees[$id];
    }
}
