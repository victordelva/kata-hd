<?php

namespace App\Services;

use App\Domain\Employee;
use App\Repositories\EmployeeRepository;

class EmployeesService
{
    private $employeesRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeesRepository = $employeeRepository;
    }

    public function getAll()
    {
        $companyId = 1;
        return $this->employeesRepository->findAll($companyId);
    }

    public function store(array $params)
    {
        $employee = (new Employee($params));
        $this->employeesRepository->createOrUpdateEmployee($employee);
    }
}
