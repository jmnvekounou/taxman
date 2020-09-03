<?php

namespace App\Entity;

use App\Repository\IncomeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IncomeRepository::class)
 */
class Income
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $billnumber;

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
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $total;

    /**
     * @ORM\Column(type="datetime")
     */
    private $receivedAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="incomes")
     */
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBillnumber(): ?string
    {
        return $this->billnumber;
    }

    public function setBillnumber(string $billnumber): self
    {
        $this->billnumber = $billnumber;

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

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getReceivedAt(): ?\DateTimeInterface
    {
        return $this->receivedAt;
    }

    public function setReceivedAt(\DateTimeInterface $receivedAt): self
    {
        $this->receivedAt = $receivedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
