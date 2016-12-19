<?php

namespace MyApp\EspritBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Flight
 *
 * @ORM\Table(name="flight", indexes={@ORM\Index(name="idairlinecompany", columns={"idairlinecompany"}), @ORM\Index(name="idarrivalcity", columns={"idarrivalcity"}), @ORM\Index(name="iddeparturecity", columns={"iddeparturecity"}), @ORM\Index(name="iddeparturecity_2", columns={"iddeparturecity"})})
 * @ORM\Entity
 */
class Flight
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idflight", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idflight;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrivaldate", type="date", nullable=false)
     */
    private $arrivaldate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="departuredate", type="date", nullable=false)
     */
    private $departuredate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrivaltime", type="time", nullable=false)
     */
    private $arrivaltime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="departuretime", type="time", nullable=false)
     */
    private $departuretime;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var \Airlinecompany
     *
     * @ORM\ManyToOne(targetEntity="Airlinecompany")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idairlinecompany", referencedColumnName="idairlinecompany")
     * })
     */
    private $idairlinecompany;

    /**
     * @var \City
     *
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idarrivalcity", referencedColumnName="idcity")
     * })
     */
    private $idarrivalcity;

    /**
     * @var \City
     *
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddeparturecity", referencedColumnName="idcity")
     * })
     */
    private $iddeparturecity;

    /**
     * @return int
     */
    public function getIdflight()
    {
        return $this->idflight;
    }

    /**
     * @param int $idflight
     */
    public function setIdflight($idflight)
    {
        $this->idflight = $idflight;
    }

    /**
     * @return \DateTime
     */
    public function getArrivaldate()
    {
        return $this->arrivaldate;
    }

    /**
     * @param \DateTime $arrivaldate
     */
    public function setArrivaldate($arrivaldate)
    {
        $this->arrivaldate = $arrivaldate;
    }

    /**
     * @return \DateTime
     */
    public function getDeparturedate()
    {
        return $this->departuredate;
    }

    /**
     * @param \DateTime $departuredate
     */
    public function setDeparturedate($departuredate)
    {
        $this->departuredate = $departuredate;
    }

    /**
     * @return \DateTime
     */
    public function getArrivaltime()
    {
        return $this->arrivaltime;
    }

    /**
     * @param \DateTime $arrivaltime
     */
    public function setArrivaltime($arrivaltime)
    {
        $this->arrivaltime = $arrivaltime;
    }

    /**
     * @return \DateTime
     */
    public function getDeparturetime()
    {
        return $this->departuretime;
    }

    /**
     * @param \DateTime $departuretime
     */
    public function setDeparturetime($departuretime)
    {
        $this->departuretime = $departuretime;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return \Airlinecompany
     */
    public function getIdairlinecompany()
    {
        return $this->idairlinecompany;
    }

    /**
     * @param \Airlinecompany $idairlinecompany
     */
    public function setIdairlinecompany($idairlinecompany)
    {
        $this->idairlinecompany = $idairlinecompany;
    }

    /**
     * @return \City
     */
    public function getIdarrivalcity()
    {
        return $this->idarrivalcity;
    }

    /**
     * @param \City $idarrivalcity
     */
    public function setIdarrivalcity($idarrivalcity)
    {
        $this->idarrivalcity = $idarrivalcity;
    }

    /**
     * @return \City
     */
    public function getIddeparturecity()
    {
        return $this->iddeparturecity;
    }

    /**
     * @param \City $iddeparturecity
     */
    public function setIddeparturecity($iddeparturecity)
    {
        $this->iddeparturecity = $iddeparturecity;
    }


}

