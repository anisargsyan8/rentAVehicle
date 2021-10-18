<?php

namespace App\Entity;

use App\Repository\VehicleBrandRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehicleBrandRepository::class)
 */
class VehicleBrand
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $vehicle_type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_of_passenger;

    /**
     * @ORM\Column(type="integer")
     */
    private $available_count;

    /**
     * @ORM\Column(type="integer")
     */
    private $total_count;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicleType(): ?int
    {
        return $this->vehicle_type;
    }

    public function setVehicleType(int $vehicle_type): self
    {
        $this->vehicle_type = $vehicle_type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNumberOfPassenger(): ?int
    {
        return $this->number_of_passenger;
    }

    public function setNumberOfPassenger(int $number_of_passenger): self
    {
        $this->number_of_passenger = $number_of_passenger;

        return $this;
    }

    public function getAvailableCount(): ?int
    {
        return $this->available_count;
    }

    public function setAvailableCount(int $available_count): self
    {
        $this->available_count = $available_count;

        return $this;
    }

    public function getTotalCount(): ?int
    {
        return $this->total_count;
    }

    public function setTotalCount(int $total_count): self
    {
        $this->total_count = $total_count;

        return $this;
    }
}
