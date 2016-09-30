<?php

namespace Transmitter\ReferralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="referencess")
 */
class Reference {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=6)
     */
    protected $refcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=TRUE)
     */
    protected $ip;

    /**
     * @ORM\Column(type="text", nullable=TRUE)
     */
    protected $referer;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date_time;

    public function __construct() {
        $this->date_time = new \DateTime("now");
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set refcode
     *
     * @param string $refcode
     * @return Reference
     */
    public function setRefcode($refcode) {
        $this->refcode = $refcode;

        return $this;
    }

    /**
     * Get refcode
     *
     * @return string 
     */
    public function getRefcode() {
        return $this->refcode;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Reference
     */
    public function setIp($ip) {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp() {
        return $this->ip;
    }

    /**
     * Set referer
     *
     * @param string $referer
     * @return Reference
     */
    public function setReferer($referer) {
        $this->referer = $referer;

        return $this;
    }

    /**
     * Get referer
     *
     * @return string 
     */
    public function getReferer() {
        return $this->referer;
    }

    /**
     * Set date_time
     *
     * @param \DateTime $dateTime
     * @return Reference
     */
    public function setDateTime($dateTime) {
        $this->date_time = $dateTime;

        return $this;
    }

    /**
     * Get date_time
     *
     * @return \DateTime 
     */
    public function getDateTime() {
        return $this->date_time;
    }

}
