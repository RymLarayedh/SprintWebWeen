<?php

namespace MyApp\WeenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tripprogram
 *
 * @ORM\Table(name="tripprogram", indexes={@ORM\Index(name="iddestination", columns={"idcity"}), @ORM\Index(name="idflight", columns={"idflight"}), @ORM\Index(name="idhotel", columns={"idhotel"})})
 * @ORM\Entity
 */
class Tripprogram
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtripprogram", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtripprogram;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrpassenger", type="integer", nullable=false)
     */
    private $nbrpassenger;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=16777215, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="rating", type="float", precision=10, scale=0, nullable=false)
     */
    private $rating;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrnight", type="integer", nullable=false)
     */
    private $nbrnight;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="blob", nullable=false)
     */
    private $video;

    /**
     * @var \Flight
     *
     * @ORM\ManyToOne(targetEntity="Flight")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idflight", referencedColumnName="idflight")
     * })
     */
    private $idflight;

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
     * @var \Hotel
     *
     * @ORM\ManyToOne(targetEntity="Hotel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idhotel", referencedColumnName="idhotel")
     * })
     */
    private $idhotel;


}

