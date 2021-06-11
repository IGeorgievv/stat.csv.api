<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="currencies")
 */
class Currency
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
     * @ORM\Column(type="string", length=3)
     * @Assert\NotBlank()
     *
     */
    private $iso_code;
    /**
     * @ORM\Column(type="smallint", options={"unsigned":true})
     * @Assert\NotBlank()
     */
    private $exchange_rate;
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
     * Get the value of iso_code
     */
    public function getIsoCode()
    {
        return $this->iso_code;
    }

    /**
     * Set the value of iso_code
     *
     * @return  self
     */
    public function setIsoCode($iso_code)
    {
        $this->iso_code = $iso_code;

        return $this;
    }

    /**
     * Get the value of exchange_rate
     */
    public function getExchangeRate()
    {
        return $this->exchange_rate / 1000;
    }

    /**
     * Get the exchange_rate for calculation
     */
    public function getExchangeRateForCalculation()
    {
        return $this->exchange_rate;
    }

    /**
     * Set the value of exchange_rate
     *
     * @return  self
     */
    public function setExchangeRate($exchange_rate)
    {
        $this->exchange_rate = $exchange_rate * 1000;

        return $this;
    }
}