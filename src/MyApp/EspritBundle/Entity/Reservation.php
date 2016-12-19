<?php

namespace MyApp\EspritBundle\Entity;

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

    /**
     * @return int
     */
    public function getIdreservation()
    {
        return $this->idreservation;
    }

    /**
     * @param int $idreservation
     */
    public function setIdreservation($idreservation)
    {
        $this->idreservation = $idreservation;
    }

    /**
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param int $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return int
     */
    public function getConfirmation()
    {
        return $this->confirmation;
    }

    /**
     * @param int $confirmation
     */
    public function setConfirmation($confirmation)
    {
        $this->confirmation = $confirmation;
    }

    /**
     * @return \Personnalizedtrip
     */
    public function getPtripid()
    {
        return $this->ptripid;
    }

    /**
     * @param \Personnalizedtrip $ptripid
     */
    public function setPtripid($ptripid)
    {
        $this->ptripid = $ptripid;
    }

    /**
     * @return \Tripprogram
     */
    public function getTripid()
    {
        return $this->tripid;
    }

    /**
     * @param \Tripprogram $tripid
     */
    public function setTripid($tripid)
    {
        $this->tripid = $tripid;
    }


}

