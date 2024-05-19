<?php
declare(strict_types=1);

namespace App\Entity\Expense;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GraphQl\Mutation;
use ApiPlatform\Metadata\GraphQl\Query;
use ApiPlatform\Metadata\GraphQl\QueryCollection;
use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[ApiResource(graphQlOperations: [
    new Query(),
    new QueryCollection(),
    new Mutation(name: 'create')
])]
#[Entity]
class Expense
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: 'bigint')]
    private ?string $id;

    #[Column(type: 'string')]
    private string $name;

    #[Column(type: 'datetime_immutable')]
    private DateTimeImmutable $implementationDate;

    #[Column(type: 'decimal', options: ['precision' => 20, 'scale' => 2])]
    private string $amount;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
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

    public function getImplementationDate(): DateTimeImmutable
    {
        return $this->implementationDate;
    }

    public function setImplementationDate(DateTimeImmutable $implementationDate): self
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
