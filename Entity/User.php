<?php

namespace Transmitter\ReferralBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string", length=6)
     */
    protected $refcode;

    /**
     * @ORM\Column(type="integer", nullable=TRUE)
     */
    protected $reference_id;

    public function __construct() {
        parent::__construct();
        $this->setRefcode(base_convert(time(), 10, 36));
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
     * @return User
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
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set reference_id
     *
     * @param integer $referenceId
     * @return User
     */
    public function setReferenceId($referenceId) {
        $this->reference_id = $referenceId;

        return $this;
    }

    /**
     * Get reference_id
     *
     * @return integer 
     */
    public function getReferenceId() {
        return $this->reference_id;
    }

}
