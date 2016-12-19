<?php

namespace MyApp\EspritBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Airlinecompany
 *
 * @ORM\Table(name="airlinecompany", indexes={@ORM\Index(name="idaddress", columns={"idaddress"})})
 * @ORM\Entity
 */
class Airlinecompany
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idairlinecompany", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idairlinecompany;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="blob", nullable=true)
     */
    private $picture;

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
    public function getIdairlinecompany()
    {
        return $this->idairlinecompany;
    }

    /**
     * @param int $idairlinecompany
     */
    public function setIdairlinecompany($idairlinecompany)
    {
        $this->idairlinecompany = $idairlinecompany;
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
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
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

