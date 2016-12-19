<?php

namespace MyApp\EspritBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Report
 *
 * @ORM\Table(name="Report", indexes={@ORM\Index(name="userid", columns={"userid"}), @ORM\Index(name="reportedtid", columns={"reportedtid"}), @ORM\Index(name="reporteduid", columns={"reporteduid"})})
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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reporteduid", referencedColumnName="id")
     * })
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
     * @return int
     */
    public function getReportid()
    {
        return $this->reportid;
    }

    /**
     * @param int $reportid
     */
    public function setReportid($reportid)
    {
        $this->reportid = $reportid;
    }

    /**
     * @return \User
     */
    public function getReporteduid()
    {
        return $this->reporteduid;
    }

    /**
     * @param \User $reporteduid
     */
    public function setReporteduid($reporteduid)
    {
        $this->reporteduid = $reporteduid;
    }

    /**
     * @return \Tripprogram
     */
    public function getReportedtid()
    {
        return $this->reportedtid;
    }

    /**
     * @param \Tripprogram $reportedtid
     */
    public function setReportedtid($reportedtid)
    {
        $this->reportedtid = $reportedtid;
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



}

