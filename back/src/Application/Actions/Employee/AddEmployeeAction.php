<?php
declare(strict_types=1);

namespace App\Application\Actions\Employee;

use App\Domain\Employee\Employee;
use Psr\Http\Message\ResponseInterface as Response;

class AddEmployeeAction extends EmployeeAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $companyId = $this->request->getAttribute('company_authenticated');
        //todo: validations
        $body = $this->request->getParsedBody();
        $employee = new Employee(
            null,
            $body['name'] ?? '',
            $body['email']?? '',
            $body['position'] ?? '',
            $body['office'] ?? '',
            (int)$body['salary'] ?? 0,
            (int)$body['weekly-hours'] ?? 0,
            $companyId
        );
        $this->employeeRepository->createOrUpdateEmployee($employee);

        $this->logger->info("Employee was added.");

        return $this->respondWithData();
    }
}
