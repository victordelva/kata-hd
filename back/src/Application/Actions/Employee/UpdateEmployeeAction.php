<?php
declare(strict_types=1);

namespace App\Application\Actions\Employee;

use App\Domain\Employee\Employee;
use App\Domain\Employee\EmployeeNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;

class UpdateEmployeeAction extends EmployeeAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $companyId = $this->request->getAttribute('company_authenticated');
        //todo: validations
        $employeeId = (int) $this->resolveArg('id');
        $employee = $this->employeeRepository->findEmployeeOfId($employeeId);

        if ($employee->getCompanyId() != $companyId) {
            throw new EmployeeNotFoundException();
        }

        $body = $this->request->getParsedBody();
        $employee->massiveEdit($body);

        $this->employeeRepository->createOrUpdateEmployee($employee);

        $this->logger->info("Employee was updated.");

        return $this->respondWithData();
    }
}
