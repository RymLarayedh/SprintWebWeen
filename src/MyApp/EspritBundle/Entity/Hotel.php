<?php

namespace MyApp\EspritBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel", indexes={@ORM\Index(name="idaddress", columns={"idaddress"}), @ORM\Index(name="idcity", columns={"idaddress"})})
 * @ORM\Entity
 */
class Hotel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idhotel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhotel;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="stars", type="integer", nullable=false)
     */
    private $stars;

    /**
     * @var float
     *
     * @ORM\Column(name="rating", type="float", precision=10, scale=0, nullable=false)
     */
    private $rating;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=20, nullable=false)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=20, nullable=false)
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="pricebynight", type="float", precision=10, scale=0, nullable=false)
     */
    private $pricebynight;

    /**
     * @var \Address
     *
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idaddress", referencedColumnName="idaddress")
     * })
     */
    private $idaddress;

    /**
     * @return int
     */
    public function getIdhotel()
    {
        return $this->idhotel;
    }

    /**
     * @param int $idhotel
     */
    public function setIdhotel($idhotel)
    {
        $this->idhotel = $idhotel;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * @param int $stars
     */
    public function setStars($stars)
    {
        $this->stars = $stars;
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
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getPricebynight()
    {
        return $this->pricebynight;
    }

    /**
     * @param float $pricebynight
     */
    public function setPricebynight($pricebynight)
    {
        $this->pricebynight = $pricebynight;
    }

    /**
     * @return \Address
     */
    public function getIdaddress()
    {
        return $this->idaddress;
    }

    /**
     * @param \Address $idaddress
     */
    public function setIdaddress($idaddress)
    {
        $this->idaddress = $idaddress;
    }


}

