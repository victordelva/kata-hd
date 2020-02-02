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
                40,
                1
            ),
            2 => new Employee(
                2,
                'Bosco Sanchez Giralt',
                'bsanchez@gmail.com',
                'Comercial',
                'Barcelona Office',
                20000,
                40,
                1
            ),
            3 => new Employee(
                3,
                'Bosco Sanchez Giralt',
                'bsanchez@gmail.com',
                'Comercial',
                'Barcelona Office',
                20000,
                40,
                1
            ),
            4 => new Employee(
                4,
                'Bosco Sanchez Giralt',
                'bsanchez@gmail.com',
                'Comercial',
                'Barcelona Office',
                20000,
                40,
                1
            ),
            5 =>new Employee(
                5,
                'Bosco Sanchez Giralt',
                'bsanchez@gmail.com',
                'Comercial',
                'Barcelona Office',
                20000,
                40,
                2
            ),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll($companyId): array
    {
        $data = array_values($this->employees);
        $data = array_filter($data, function ($item) use ($companyId) {
            return $item->getCompanyId() == $companyId;
        });
        return $data;
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

    /**
     * {@inheritdoc}
     */
    public function createOrUpdateEmployee(Employee $employee)
    {
        if (!isset($this->employees[$employee->getId()])) {
            $this->employees[$employee->getId()] = $employee;
        } else {
            $maxId = max(array_map(function($o) {
                return $o->id;
            }, $this->employees));

            $this->employees[$maxId] = $employee;
        }

        $this->employees[$employee->getId()] = $employee;
    }
}
