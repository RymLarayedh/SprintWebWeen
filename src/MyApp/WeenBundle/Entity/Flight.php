<?php

namespace MyApp\WeenBundle\Entity;

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


}

