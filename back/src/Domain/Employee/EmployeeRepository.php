<?php
declare(strict_types=1);

namespace App\Domain\Employee;

interface EmployeeRepository
{
    /**
     * @return Employee[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Employee
     * @throws EmployeeNotFoundException
     */
    public function findEmployeeOfId(int $id): Employee;
}
