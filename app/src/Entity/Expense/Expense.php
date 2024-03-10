<?php
declare(strict_types=1);

namespace App\Entity\Expense;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Expense
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: 'bigint')]
    private ?int $id;

    #[Column(type: 'string')]
    private string $name;

    #[Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $implementationDate;

    #[Column(type: 'decimal', options: ['precision' => 20, 'scale' => 2])]
    private string $amount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImplementationDate(): \DateTimeImmutable
    {
        return $this->implementationDate;
    }

    public function setImplementationDate(\DateTimeImmutable $implementationDate): self
    {
        $this->implementationDate = $implementationDate;

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
}
