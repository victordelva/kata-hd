<?php

namespace App\Repositories;

use App\Domain\Employee;
use Illuminate\Support\Facades\DB;

interface EmployeeRepository
{
    /**
     * {@inheritDoc}
     */
    public function findAll($companyId):array;

    /**
     * {@inheritDoc}
     */
    public function findEmployeeOfId(int $id): Employee;

    public function createOrUpdateEmployee(Employee $employee);
}
