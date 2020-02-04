<?php

namespace App\Repositories;


use App\Domain\Employee;
use Illuminate\Support\Facades\DB;

class DatabaseEmployeeRepository implements EmployeeRepository
{
    /**
     * {@inheritDoc}
     */
    public function findAll($companyId):array
    {
        return app('db')->select("SELECT * FROM employees");
    }

    /**
     * {@inheritDoc}
     */
    public function findEmployeeOfId(int $id): Employee
    {

    }

    public function createOrUpdateEmployee(Employee $employee)
    {

        return $employee->save();
    }
}
