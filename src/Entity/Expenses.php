<?php

namespace App\Entity;

use App\Repository\ExpensesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExpensesRepository::class)
 */
class Expenses
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=ExpenseType::class, inversedBy="expenses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $amount;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $tps;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $tvq;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $tvh;

    /**
     * @ORM\ManyToOne(targetEntity=Provider::class, inversedBy="expenses")
     */
    private $provider;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getType(): ?ExpenseType
    {
        return $this->type;
    }

    public function setType(?ExpenseType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getTps(): ?string
    {
        return $this->tps;
    }

    public function setTps(?string $tps): self
    {
        $this->tps = $tps;

        return $this;
    }

    public function getTvq(): ?string
    {
        return $this->tvq;
    }

    public function setTvq(?string $tvq): self
    {
        $this->tvq = $tvq;

        return $this;
    }

    public function getTvh(): ?string
    {
        return $this->tvh;
    }

    public function setTvh(?string $tvh): self
    {
        $this->tvh = $tvh;

        return $this;
    }
}
