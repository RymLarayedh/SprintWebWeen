<?php

namespace MyApp\EspritBundle\Entity;
use Doctrine\ORM\Query\Expr\Base;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="MyApp\EspritBundle\Entity\UtilisateurRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=20, nullable=false)
     */
    private $lastname;

    /**
     * @var integer
     *
     * @ORM\Column(name="idaddress", type="integer", nullable=false)
     */
    private $idaddress;


    /**
     * @var integer
     *
     * @ORM\Column(name="phonenumber", type="integer", nullable=false)
     */
    private $phonenumber;


    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LastConnection", type="date", nullable=false)
     */
    private $lastconnection;

    /**
     * @var integer
     *
     * @ORM\Column(name="isConnected", type="integer", nullable=false)
     */
    private $isconnected;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="blob", nullable=false)
     */
    private $picture;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return int
     */
    public function getIdaddress()
    {
        return $this->idaddress;
    }

    /**
     * @param int $idaddress
     */
    public function setIdaddress($idaddress)
    {
        $this->idaddress = $idaddress;
    }

    /**
     * @return int
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * @param int $phonenumber
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
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
     * @return \DateTime
     */
    public function getLastconnection()
    {
        return $this->lastconnection;
    }

    /**
     * @param \DateTime $lastconnection
     */
    public function setLastconnection($lastconnection)
    {
        $this->lastconnection = $lastconnection;
    }

    /**
     * @return int
     */
    public function getIsconnected()
    {
        return $this->isconnected;
    }

    /**
     * @param int $isconnected
     */
    public function setIsconnected($isconnected)
    {
        $this->isconnected = $isconnected;
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

    public function getParent()
    {
        return 'FOSUserBundle';
    }


}

