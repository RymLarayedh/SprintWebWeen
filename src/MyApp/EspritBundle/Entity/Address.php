<?php

namespace MyApp\EspritBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address", indexes={@ORM\Index(name="idcity", columns={"idcity"}), @ORM\Index(name="idcountry", columns={"idcountry"})})
 * @ORM\Entity
 */
class Address
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idaddress", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idaddress;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=20, nullable=false)
     */
    private $street;

    /**
     * @var integer
     *
     * @ORM\Column(name="zipcode", type="integer", nullable=false)
     */
    private $zipcode;

    /**
     * @var \City
     *
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcity", referencedColumnName="idcity")
     * })
     */
    private $idcity;

    /**
     * @var \Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcountry", referencedColumnName="idcountry")
     * })
     */
    private $idcountry;

    /**
     * @return int
     */
    public function getIdaddress()
    {
        return $this->idaddress;
    }

    /**
     * @param int $idaddress
     */
    public function setIdaddress($idaddress)
    {
        $this->idaddress = $idaddress;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return int
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param int $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return \City
     */
    public function getIdcity()
    {
        return $this->idcity;
    }

    /**
     * @param \City $idcity
     */
    public function setIdcity($idcity)
    {
        $this->idcity = $idcity;
    }

    /**
     * @return \Country
     */
    public function getIdcountry()
    {
        return $this->idcountry;
    }

    /**
     * @param \Country $idcountry
     */
    public function setIdcountry($idcountry)
    {
        $this->idcountry = $idcountry;
    }




}

