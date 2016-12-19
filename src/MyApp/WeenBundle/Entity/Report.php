<?php

namespace MyApp\WeenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Report
 *
 * @ORM\Table(name="report", indexes={@ORM\Index(name="reportedtid", columns={"reportedtid"})})
 * @ORM\Entity
 */
class Report
{
    /**
     * @var integer
     *
     * @ORM\Column(name="reportid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reportid;

    /**
     * @var integer
     *
     * @ORM\Column(name="userid", type="integer", nullable=false)
     */
    private $userid;

    /**
     * @var integer
     *
     * @ORM\Column(name="reporteduid", type="integer", nullable=false)
     */
    private $reporteduid;

    /**
     * @var \Tripprogram
     *
     * @ORM\ManyToOne(targetEntity="Tripprogram")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reportedtid", referencedColumnName="idtripprogram")
     * })
     */
    private $reportedtid;


}

