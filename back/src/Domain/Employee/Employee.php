<?php
declare(strict_types=1);

namespace App\Domain\Employee;

use JsonSerializable;

class Employee implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * This could be a relation with another table 'positions'
     * @var string
     */
    private $position;

    /**
     * This could be a relation with another table 'offices'
     * @var string
     */
    private $office;

    /**
     * @var int
     */
    private $salary;

    /**
     * @var int
     */
    private $weeklyHours;

    /**
     * @param int|null  $id
     * @param string    $name
     * @param string    $email
     * @param string    $position
     * @param string    $office
     * @param int    $salary
     * @param int    $weeklyHours
     */
    public function __construct(?int $id,
                                string $name,
                                string $email,
                                string $position,
                                string $office,
                                int $salary,
                                int $weeklyHours
    ) {
        $this->id = $id;
        $this->name = strtolower($name);
        $this->email = ucfirst($email);
        $this->position = ucfirst($position);
        $this->office = ucfirst($office);
        $this->salary = $salary;
        $this->weeklyHours = $weeklyHours;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function getOffice(): string
    {
        return $this->office;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'position' => $this->position,
            'office' => $this->office,
            'salary' => $this->salary,
            'weekly-hours' => $this->weeklyHours,
        ];
    }
}
