<?php

namespace MyApp\WeenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personnalizedtrip
 *
 * @ORM\Table(name="personnalizedtrip", indexes={@ORM\Index(name="hotelid", columns={"numbernights"}), @ORM\Index(name="idcountry", columns={"idcountry"}), @ORM\Index(name="idhotel", columns={"idhotel"})})
 * @ORM\Entity
 */
class Personnalizedtrip
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idpersotrip", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpersotrip;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="departuredate", type="date", nullable=true)
     */
    private $departuredate;

    /**
     * @var integer
     *
     * @ORM\Column(name="Duration", type="integer", nullable=true)
     */
    private $duration;

    /**
     * @var integer
     *
     * @ORM\Column(name="adults", type="integer", nullable=true)
     */
    private $adults;

    /**
     * @var integer
     *
     * @ORM\Column(name="children", type="integer", nullable=true)
     */
    private $children;

    /**
     * @var integer
     *
     * @ORM\Column(name="numbernights", type="integer", nullable=true)
     */
    private $numbernights;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=30, nullable=true)
     */
    private $mail;

    /**
     * @var \Address
     *
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcountry", referencedColumnName="idaddress")
     * })
     */
    private $idcountry;

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

