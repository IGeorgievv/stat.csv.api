<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="customers")
 * @UniqueEntity("vat_number")
 */
class Customer
{
    /**
     * @ORM\Column(type="bigint", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank()
     *
     */
    private $name;
    /**
     * @ORM\Column(type="string", length=250, unique=true)
     * @Assert\NotBlank()
     *
     */
    private $vat_number;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Invoice", mappedBy="invoice")
     */
    private $invoices;

    public function __construct()
    {
        $this->invoices = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of vat_number
     */
    public function getVatNumber()
    {
        return $this->vat_number;
    }

    /**
     * Set the value of vat_number
     *
     * @return  self
     */
    public function setVatNumber($vat_number)
    {
        $this->vat_number = $vat_number;

        return $this;
    }

    /**
     * @return Collection|Invoice[]
     */
    public function getInvoices(): Collection
    {
        return $this->invoices;
    }

    public function addInvoice(?Invoice $invoice): self
    {
        $isInserted = false;
        foreach ($this->invoices as $invoiceK => $invoiceV) {
            if ($invoiceV->id === $invoice->id) {
                $isInserted = true;
                break;
            }
        }
        if (!$isInserted) {
            $this->invoices[] = $invoice;
        }

        return $this;
    }

    public function removeInvoice(?Invoice $invoice): self
    {
        foreach ($this->invoices as $invoiceK => $invoiceV) {
            if ($invoiceV->id === $invoice->id) {
                unset($this->invoices[$invoiceK]);
                break;
            }
        }

        return $this;
    }
}