<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $monthlyPrice = null;

    #[ORM\Column]
    private ?int $dailyPrice = null;

    #[ORM\Column]
    private ?int $numberSeats = null;

    #[ORM\Column]
    private ?bool $isManualGearbox = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMonthlyPrice(): ?int
    {
        return $this->monthlyPrice;
    }

    public function setMonthlyPrice(int $monthlyPrice): static
    {
        $this->monthlyPrice = $monthlyPrice;

        return $this;
    }

    public function getDailyPrice(): ?int
    {
        return $this->dailyPrice;
    }

    public function setDailyPrice(int $dailyPrice): static
    {
        $this->dailyPrice = $dailyPrice;

        return $this;
    }

    public function getNumberSeats(): ?int
    {
        return $this->numberSeats;
    }

    public function setNumberSeats(int $numberSeats): static
    {
        $this->numberSeats = $numberSeats;

        return $this;
    }

    public function isManualGearbox(): ?bool
    {
        return $this->isManualGearbox;
    }

    public function setIsManualGearbox(bool $isManualGearbox): static
    {
        $this->isManualGearbox = $isManualGearbox;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
