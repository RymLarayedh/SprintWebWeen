<?php

namespace MyApp\EspritBundle\Entity;

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

    /**
     * @return int
     */
    public function getIdtripprogram()
    {
        return $this->idtripprogram;
    }

    /**
     * @param int $idtripprogram
     */
    public function setIdtripprogram($idtripprogram)
    {
        $this->idtripprogram = $idtripprogram;
    }

    /**
     * @return int
     */
    public function getNbrpassenger()
    {
        return $this->nbrpassenger;
    }

    /**
     * @param int $nbrpassenger
     */
    public function setNbrpassenger($nbrpassenger)
    {
        $this->nbrpassenger = $nbrpassenger;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return float
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param float $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return int
     */
    public function getNbrnight()
    {
        return $this->nbrnight;
    }

    /**
     * @param int $nbrnight
     */
    public function setNbrnight($nbrnight)
    {
        $this->nbrnight = $nbrnight;
    }

    /**
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param string $video
     */
    public function setVideo($video)
    {
        $this->video = $video;
    }

    /**
     * @return \Flight
     */
    public function getIdflight()
    {
        return $this->idflight;
    }

    /**
     * @param \Flight $idflight
     */
    public function setIdflight($idflight)
    {
        $this->idflight = $idflight;
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
     * @return \Hotel
     */
    public function getIdhotel()
    {
        return $this->idhotel;
    }

    /**
     * @param \Hotel $idhotel
     */
    public function setIdhotel($idhotel)
    {
        $this->idhotel = $idhotel;
    }


}

