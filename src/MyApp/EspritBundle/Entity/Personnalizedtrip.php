<?php

namespace MyApp\EspritBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personnalizedtrip
 *
 * @ORM\Table(name="personnalizedtrip",indexes={  @ORM\Index(name="idhotel", columns={"idhotel"}), @ORM\Index(name="idcountry", columns={"idcountry"})})
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
     * @var \Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcountry", referencedColumnName="idcountry")
     * })
     */
    private $idcountry;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrivaldate", type="date", nullable=false)
     */
    private $arrivaldate;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer", nullable=false)
     */



    private $duration;
    /**
     * @var integer
     *
     * @ORM\Column(name="adults", type="integer", nullable=false)
     */
    private $adults;
    /**
     * @var integer
     *
     * @ORM\Column(name="children", type="integer", nullable=false)
     */
    private $children;
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
     * @var integer
     *
     * @ORM\Column(name="numbernights", type="integer", nullable=false)
     */
    private $numbernights;
    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=30, nullable=false)
     */
    private $mail;

    /**
     * @return int
     */
    public function getIdpersotrip()
    {
        return $this->idpersotrip;
    }

    /**
     * @param int $idpersotrip
     */
    public function setIdpersotrip($idpersotrip)
    {
        $this->idpersotrip = $idpersotrip;
    }

    /**
     * @return \Country
     */
    public function getIdcountry()
    {
        return $this->idcountry;
    }

    /**
     * @param \Country $idcountry
     */
    public function setIdcountry($idcountry)
    {
        $this->idcountry = $idcountry;
    }



    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    public function getAdults()
    {
        return $this->adults;
    }

    /**
     * @param int $adults
     */
    public function setAdults($adults)
    {
        $this->adults = $adults;
    }

    /**
     * @return int
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param int $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
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

    /**
     * @return int
     */
    public function getNumbernights()
    {
        return $this->numbernights;
    }

    /**
     * @param int $numbernights
     */
    public function setNumbernights($numbernights)
    {
        $this->numbernights = $numbernights;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
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



}