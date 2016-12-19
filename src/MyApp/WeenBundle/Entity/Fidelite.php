<?php

namespace MyApp\WeenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fidelite
 *
 * @ORM\Table(name="fidelite", indexes={@ORM\Index(name="trip1id", columns={"trip1id", "trip2id", "trip3id"}), @ORM\Index(name="fkf2", columns={"trip2id"}), @ORM\Index(name="fkf3", columns={"trip3id"}), @ORM\Index(name="IDX_EF425B23E7F5C824", columns={"trip1id"})})
 * @ORM\Entity
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
     * @var integer
     *
     * @ORM\Column(name="userid", type="integer", nullable=false)
     */
    private $userid;

    /**
     * @var integer
     *
     * @ORM\Column(name="vu", type="integer", nullable=false)
     */
    private $vu;

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


}

