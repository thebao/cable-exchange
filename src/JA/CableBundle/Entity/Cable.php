<?php

namespace JA\CableBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cable
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JA\CableBundle\Entity\CableRepository")
 */
class Cable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="imageUrl", type="string", length=255, nullable=true)
     */
    private $imageUrl = null;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="volts", type="float", nullable=true)
     */
    private $volts = null;

    /**
     * @var string
     *
     * @ORM\Column(name="amps", type="float", nullable=true)
     */
    private $amps = null;

    /**
     * @var string
     *
     * @ORM\Column(name="length", type="float", nullable=true)
     */
    private $length = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;


    public function __construct()
    {
        // Par défaut, la date de l'annonce est la date d'aujourd'hui
        $this->createdAt = new \Datetime();
    }



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
     * Set name
     *
     * @param string $name
     * @return Cable
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     * @return Cable
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string 
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Cable
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set volts
     *
     * @param string $volts
     * @return Cable
     */
    public function setVolts($volts)
    {
        $this->volts = $volts;

        return $this;
    }

    /**
     * Get volts
     *
     * @return string 
     */
    public function getVolts()
    {
        return $this->volts;
    }

    /**
     * Set amps
     *
     * @param string $amps
     * @return Cable
     */
    public function setAmps($amps)
    {
        $this->amps = $amps;

        return $this;
    }

    /**
     * Get amps
     *
     * @return string 
     */
    public function getAmps()
    {
        return $this->amps;
    }

    /**
     * Set length
     *
     * @param string $length
     * @return Cable
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return string 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Cable
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    public function getJSONArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['name'] = $this->name;
        $array['snippet'] = $this->description;
        $array['imageUrl'] = $this->imageUrl;
        $array['amps'] = $this->amps;
        $array['volts'] = $this->volts;
        $array['length'] = $this->length;
        $array['type'] = $this->type;

        return $array;
    }


}
