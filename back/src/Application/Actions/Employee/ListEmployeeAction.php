<?php
declare(strict_types=1);

namespace App\Application\Actions\Employee;

use Psr\Http\Message\ResponseInterface as Response;

class ListEmployeeAction extends EmployeeAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $companyId = $this->request->getAttribute('company_authenticated');
        $users = $this->employeeRepository->findAll($companyId);

        $this->logger->info("Employee list was viewed.");

        return $this->respondWithData($users);
    }
}
