<?php

namespace MyApp\EspritBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Friends
 *
 * @ORM\Table(name="friends", indexes={@ORM\Index(name="userid", columns={"userid"}), @ORM\Index(name="friendid", columns={"friendid"})})
 * @ORM\Entity(repositoryClass="MyApp\EspritBundle\Entity\FriendsRepository")
 */
class Friends
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idfu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfu;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="friendid", referencedColumnName="id")
     * })
     */
    private $friendid;

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
    public function getIdfu()
    {
        return $this->idfu;
    }

    /**
     * @param int $idfu
     */
    public function setIdfu($idfu)
    {
        $this->idfu = $idfu;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \User
     */
    public function getFriendid()
    {
        return $this->friendid;
    }

    /**
     * @param \User $friendid
     */
    public function setFriendid($friendid)
    {
        $this->friendid = $friendid;
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

