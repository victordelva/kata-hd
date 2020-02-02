<?php
declare(strict_types=1);

namespace App\Domain\Employee;

interface EmployeeRepository
{
    /**
     * Get all Employees from a company
     * @return Employee[]
     */
    public function findAll($companyId): array;

    /**
     * @param int $id
     * @return Employee
     * @throws EmployeeNotFoundException
     */
    public function findEmployeeOfId(int $id): Employee;

    /**
     * Add or update Employee
     *
     * @param Employee $employee
     */
    public function createOrUpdateEmployee(Employee $employee);
}
