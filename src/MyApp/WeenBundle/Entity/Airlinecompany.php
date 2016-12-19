<?php

namespace MyApp\WeenBundle\Entity;

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


}

