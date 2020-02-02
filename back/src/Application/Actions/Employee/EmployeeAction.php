<?php
declare(strict_types=1);

namespace App\Application\Actions\Employee;

use App\Application\Actions\Action;
use App\Domain\Employee\EmployeeRepository;
use App\Domain\User\UserRepository;
use Psr\Log\LoggerInterface;

abstract class EmployeeAction extends Action
{
    /**
     * @var EmployeeRepository
     */
    protected $employeeRepository;

    /**
     * @param LoggerInterface $logger
     * @param UserRepository  $employeeRepository
     */
    public function __construct(LoggerInterface $logger, EmployeeRepository $employeeRepository)
    {
        parent::__construct($logger);
        $this->employeeRepository = $employeeRepository;
    }
}
