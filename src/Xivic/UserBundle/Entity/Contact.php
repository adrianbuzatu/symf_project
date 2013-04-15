<?php

namespace Xivic\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact")
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", length=11)
     */
    protected $userid;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nume;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $prenume;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    protected $telefon;

    /**
     * @ORM\Column(type="text")
     */
    protected $adresa;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     * Set userid
     *
     * @param integer $userid
     * @return Contact
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set nume
     *
     * @param string $nume
     * @return Contact
     */
    public function setNume($nume)
    {
        $this->nume = $nume;

        return $this;
    }

    /**
     * Get nume
     *
     * @return string
     */
    public function getNume()
    {
        return $this->nume;
    }

    /**
     * Set prenume
     *
     * @param string $prenume
     * @return Contact
     */
    public function setPrenume($prenume)
    {
        $this->prenume = $prenume;

        return $this;
    }

    /**
     * Get prenume
     *
     * @return string
     */
    public function getPrenume()
    {
        return $this->prenume;
    }

    /**
     * Set telefon
     *
     * @param integer $telefon
     * @return Contact
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return integer
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Set adresa
     *
     * @param string $adresa
     * @return Contact
     */
    public function setAdresa($adresa)
    {
        $this->adresa = $adresa;

        return $this;
    }

    /**
     * Get adresa
     *
     * @return string
     */
    public function getAdresa()
    {
        return $this->adresa;
    }
}