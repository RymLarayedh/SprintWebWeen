<?php

namespace MyApp\WeenBundle\Entity;

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


}

