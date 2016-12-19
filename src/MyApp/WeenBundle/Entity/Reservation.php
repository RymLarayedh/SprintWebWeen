<?php

namespace MyApp\WeenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="fkpt", columns={"ptripid"}), @ORM\Index(name="fkpt1", columns={"tripid"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idreservation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreservation;

    /**
     * @var integer
     *
     * @ORM\Column(name="userid", type="integer", nullable=false)
     */
    private $userid;

    /**
     * @var integer
     *
     * @ORM\Column(name="confirmation", type="integer", nullable=false)
     */
    private $confirmation;

    /**
     * @var \Personnalizedtrip
     *
     * @ORM\ManyToOne(targetEntity="Personnalizedtrip")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ptripid", referencedColumnName="idpersotrip")
     * })
     */
    private $ptripid;

    /**
     * @var \Tripprogram
     *
     * @ORM\ManyToOne(targetEntity="Tripprogram")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tripid", referencedColumnName="idtripprogram")
     * })
     */
    private $tripid;


}

