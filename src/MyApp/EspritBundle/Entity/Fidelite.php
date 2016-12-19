<?php

namespace MyApp\EspritBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fidelite
 *
 * @ORM\Table(name="Fidelite", indexes={@ORM\Index(name="userid", columns={"userid"}),
 *      @ORM\Index(name="trip1id", columns={"trip1id"}),
 *      @ORM\Index(name="trip2id", columns={"trip2id"}),
 *     @ORM\Index(name="trip3id", columns={"trip3id"})})
 * @ORM\Entity(repositoryClass="MyApp\EspritBundle\Entity\FideliteRepository")
 */

class Fidelite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="fideliteid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fideliteid;




    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userid", referencedColumnName="id")
     * })
     */
    private $userid;




    /**
     * @var \Tripprogram
     *
     * @ORM\ManyToOne(targetEntity="Tripprogram")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="trip1id", referencedColumnName="idtripprogram")
     * })
     */
    private $trip1id;

    /**
     * @var \Tripprogram
     *
     * @ORM\ManyToOne(targetEntity="Tripprogram")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="trip2id", referencedColumnName="idtripprogram")
     * })
     */
    private $trip2id;

    /**
     * @var \Tripprogram
     *
     * @ORM\ManyToOne(targetEntity="Tripprogram")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="trip3id", referencedColumnName="idtripprogram")
     * })
     */
    private $trip3id;

    /**
     * @var integer
     *
     * @ORM\Column(name="vu", type="integer", nullable=false)
     */
    private $vu;

    /**
     * @return int
     */
    public function getFideliteid()
    {
        return $this->fideliteid;
    }

    /**
     * @param int $fideliteid
     */
    public function setFideliteid($fideliteid)
    {
        $this->fideliteid = $fideliteid;
    }

    /**
     * @return \User
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param \User $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return \Tripprogram
     */
    public function getTrip1id()
    {
        return $this->trip1id;
    }

    /**
     * @param \Tripprogram $trip1id
     */
    public function setTrip1id($trip1id)
    {
        $this->trip1id = $trip1id;
    }

    /**
     * @return \Tripprogram
     */
    public function getTrip2id()
    {
        return $this->trip2id;
    }

    /**
     * @param \Tripprogram $trip2id
     */
    public function setTrip2id($trip2id)
    {
        $this->trip2id = $trip2id;
    }

    /**
     * @return \Tripprogram
     */
    public function getTrip3id()
    {
        return $this->trip3id;
    }

    /**
     * @param \Tripprogram $trip3id
     */
    public function setTrip3id($trip3id)
    {
        $this->trip3id = $trip3id;
    }

    /**
     * @return int
     */
    public function getVu()
    {
        return $this->vu;
    }

    /**
     * @param int $vu
     */
    public function setVu($vu)
    {
        $this->vu = $vu;
    }



}

