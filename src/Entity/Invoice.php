<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="invoices")
 */
class Invoice
{
    const TYPE_INVOICE = 1;
    const TYPE_CREDIT = 2;
    const TYPE_DEBIT = 3;

    /**
     * @ORM\Column(type="bigint", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="bigint", options={"unsigned":true})
     * @Assert\NotBlank()
     */
    private $customer_id;
    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank()
     *
     */
    private $number;
    /**
     * @ORM\Column(type="smallint", options={"unsigned":true})
     * @Assert\NotBlank()
     */
    private $type;
    /**
     * @ORM\Column(type="bigint", options={"unsigned":true})
     */
    private $parent_id;
    /**
     * @ORM\Column(type="string", length=3)
     * @Assert\NotBlank()
     */
    private $currency_code;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $total;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer", inversedBy="invoices")
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Currency", inversedBy="invoices")
     */
    private $currency;

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
     * Get the value of customer_id
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Set the value of customer_id
     *
     * @return  self
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    /**
     * Get the value of number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of parent_id
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Set the value of parent_id
     *
     * @return  self
     */
    public function setParentId($parent_id)
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    /**
     * Get the value of currency_code
     */
    public function getCurrencyCode()
    {
        return $this->currency_code;
    }

    /**
     * Set the value of currency_code
     *
     * @return  self
     */
    public function setCurrencyCode($currency_code)
    {
        $this->currency_code = $currency_code;

        return $this;
    }

    /**
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */
    public function setTotal($total)
    {
        $this->total = $total;

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

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }
}