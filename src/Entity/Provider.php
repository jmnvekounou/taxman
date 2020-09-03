<?php

namespace App\Entity;

use App\Repository\ProviderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProviderRepository::class)
 */
class Provider
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $addressone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressetwo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phoneone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phonetwo;

    /**
     * @ORM\OneToMany(targetEntity=Expenses::class, mappedBy="provider")
     */
    private $expenses;

    public function __construct()
    {
        $this->expenses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAddressone(): ?string
    {
        return $this->addressone;
    }

    public function setAddressone(string $addressone): self
    {
        $this->addressone = $addressone;

        return $this;
    }

    public function getAddressetwo(): ?string
    {
        return $this->addressetwo;
    }

    public function setAddressetwo(?string $addressetwo): self
    {
        $this->addressetwo = $addressetwo;

        return $this;
    }

    public function getPhoneone(): ?string
    {
        return $this->phoneone;
    }

    public function setPhoneone(string $phoneone): self
    {
        $this->phoneone = $phoneone;

        return $this;
    }

    public function getPhonetwo(): ?string
    {
        return $this->phonetwo;
    }

    public function setPhonetwo(?string $phonetwo): self
    {
        $this->phonetwo = $phonetwo;

        return $this;
    }

    /**
     * @return Collection|Expenses[]
     */
    public function getExpenses(): Collection
    {
        return $this->expenses;
    }

    public function addExpense(Expenses $expense): self
    {
        if (!$this->expenses->contains($expense)) {
            $this->expenses[] = $expense;
            $expense->setProvider($this);
        }

        return $this;
    }

    public function removeExpense(Expenses $expense): self
    {
        if ($this->expenses->contains($expense)) {
            $this->expenses->removeElement($expense);
            // set the owning side to null (unless already changed)
            if ($expense->getProvider() === $this) {
                $expense->setProvider(null);
            }
        }

        return $this;
    }
}
