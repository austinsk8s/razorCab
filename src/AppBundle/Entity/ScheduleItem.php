<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ScheduleItem
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ScheduleItemRepository")
 */
class ScheduleItem
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
     *
     * @ORM\Column(name="scheduledInTime", type="datetime")
     */
    private $scheduledInTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="scheduledOutTime", type="datetime")
     */
    private $scheduledOutTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="clockInTime", type="datetime")
     */
    private $clockInTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="clockOutTime", type="datetime")
     */
    private $clockOutTime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isPickupInfoComplete", type="boolean")
     */
    private $isPickupInfoComplete;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isDropbackInfoComplete", type="boolean")
     */
    private $isDropbackInfoComplete;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $driver;

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
     * Set scheduledInTime
     *
     * @param \DateTime $scheduledInTime
     * @return ScheduleItem
     */
    public function setScheduledInTime($scheduledInTime)
    {
        $this->scheduledInTime = $scheduledInTime;

        return $this;
    }

    /**
     * Get scheduledInTime
     *
     * @return \DateTime 
     */
    public function getScheduledInTime()
    {
        return $this->scheduledInTime;
    }

    /**
     * Set scheduledOutTime
     *
     * @param \DateTime $scheduledOutTime
     * @return ScheduleItem
     */
    public function setScheduledOutTime($scheduledOutTime)
    {
        $this->scheduledOutTime = $scheduledOutTime;

        return $this;
    }

    /**
     * Get scheduledOutTime
     *
     * @return \DateTime 
     */
    public function getScheduledOutTime()
    {
        return $this->scheduledOutTime;
    }

    /**
     * Set clockInTime
     *
     * @param \DateTime $clockInTime
     * @return ScheduleItem
     */
    public function setClockInTime($clockInTime)
    {
        $this->clockInTime = $clockInTime;

        return $this;
    }

    /**
     * Get clockInTime
     *
     * @return \DateTime 
     */
    public function getClockInTime()
    {
        return $this->clockInTime;
    }

    /**
     * Set clockOutTime
     *
     * @param \DateTime $clockOutTime
     * @return ScheduleItem
     */
    public function setClockOutTime($clockOutTime)
    {
        $this->clockOutTime = $clockOutTime;

        return $this;
    }

    /**
     * Get clockOutTime
     *
     * @return \DateTime 
     */
    public function getClockOutTime()
    {
        return $this->clockOutTime;
    }

    /**
     * Set isPickupInfoComplete
     *
     * @param boolean $isPickupInfoComplete
     * @return ScheduleItem
     */
    public function setIsPickupInfoComplete($isPickupInfoComplete)
    {
        $this->isPickupInfoComplete = $isPickupInfoComplete;

        return $this;
    }

    /**
     * Get isPickupInfoComplete
     *
     * @return boolean 
     */
    public function getIsPickupInfoComplete()
    {
        return $this->isPickupInfoComplete;
    }

    /**
     * Set isDropbackInfoComplete
     *
     * @param boolean $isDropbackInfoComplete
     * @return ScheduleItem
     */
    public function setIsDropbackInfoComplete($isDropbackInfoComplete)
    {
        $this->isDropbackInfoComplete = $isDropbackInfoComplete;

        return $this;
    }

    /**
     * Get isDropbackInfoComplete
     *
     * @return boolean 
     */
    public function getIsDropbackInfoComplete()
    {
        return $this->isDropbackInfoComplete;
    }

    /**
     * Set driver
     *
     * @param string $driver
     * @return ScheduleItem
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * Get driver
     *
     * @return User
     */
    public function getDriver()
    {
        return $this->driver;
    }
}
