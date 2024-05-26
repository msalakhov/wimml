<?php

namespace App\Entity\Income;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'incomes')]
class Income
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private ?int $id;

    #[Column(type: 'string', length: 255, nullable: true)]
    private ?string $name;

    #[Column(type: 'string', length: 255, nullable: true)]
    private ?string $description;

    /** @var numeric-string */
    #[Column(type: 'string', length: 255)]
    private string $amount;

    #[Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $incomeDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getIncomeDate(): \DateTimeImmutable
    {
        return $this->incomeDate;
    }

    public function setIncomeDate(\DateTimeImmutable $incomeDate): self
    {
        $this->incomeDate = $incomeDate;
        return $this;
    }
}
