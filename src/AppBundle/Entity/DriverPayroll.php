<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DriverPayroll
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DriverPayrollRepository")
 */
class DriverPayroll
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
     * @ORM\Column(name="pickupTime", type="datetime")
     */
    private $pickupTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dropOffTime", type="datetime")
     */
    private $dropOffTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="breakHours", type="integer")
     */
    private $breakHours;

    /**
     * @var integer
     *
     * @ORM\Column(name="numJourneys", type="integer")
     */
    private $numJourneys;

    /**
     * @var integer
     *
     * @ORM\Column(name="workMilesDriven", type="integer")
     */
    private $workMilesDriven;

    /**
     * @var integer
     *
     * @ORM\Column(name="leisureMilesDriven", type="integer")
     */
    private $leisureMilesDriven;

    /**
     * @var integer
     *
     * @ORM\Column(name="faresCollected", type="integer")
     */
    private $faresCollected;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipsCollected", type="integer")
     */
    private $tipsCollected;


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
     * Set pickupTime
     *
     * @param \DateTime $pickupTime
     * @return DriverPayroll
     */
    public function setPickupTime($pickupTime)
    {
        $this->pickupTime = $pickupTime;

        return $this;
    }

    /**
     * Get pickupTime
     *
     * @return \DateTime 
     */
    public function getPickupTime()
    {
        return $this->pickupTime;
    }

    /**
     * Set dropOffTime
     *
     * @param \DateTime $dropOffTime
     * @return DriverPayroll
     */
    public function setDropOffTime($dropOffTime)
    {
        $this->dropOffTime = $dropOffTime;

        return $this;
    }

    /**
     * Get dropOffTime
     *
     * @return \DateTime 
     */
    public function getDropOffTime()
    {
        return $this->dropOffTime;
    }

    /**
     * Set breakHours
     *
     * @param integer $breakHours
     * @return DriverPayroll
     */
    public function setBreakHours($breakHours)
    {
        $this->breakHours = $breakHours;

        return $this;
    }

    /**
     * Get breakHours
     *
     * @return integer 
     */
    public function getBreakHours()
    {
        return $this->breakHours;
    }

    /**
     * Set numJourneys
     *
     * @param integer $numJourneys
     * @return DriverPayroll
     */
    public function setNumJourneys($numJourneys)
    {
        $this->numJourneys = $numJourneys;

        return $this;
    }

    /**
     * Get numJourneys
     *
     * @return integer 
     */
    public function getNumJourneys()
    {
        return $this->numJourneys;
    }

    /**
     * Set workMilesDriven
     *
     * @param integer $workMilesDriven
     * @return DriverPayroll
     */
    public function setWorkMilesDriven($workMilesDriven)
    {
        $this->workMilesDriven = $workMilesDriven;

        return $this;
    }

    /**
     * Get workMilesDriven
     *
     * @return integer 
     */
    public function getWorkMilesDriven()
    {
        return $this->workMilesDriven;
    }

    /**
     * Set leisureMilesDriven
     *
     * @param integer $leisureMilesDriven
     * @return DriverPayroll
     */
    public function setLeisureMilesDriven($leisureMilesDriven)
    {
        $this->leisureMilesDriven = $leisureMilesDriven;

        return $this;
    }

    /**
     * Get leisureMilesDriven
     *
     * @return integer 
     */
    public function getLeisureMilesDriven()
    {
        return $this->leisureMilesDriven;
    }

    /**
     * Set faresCollected
     *
     * @param integer $faresCollected
     * @return DriverPayroll
     */
    public function setFaresCollected($faresCollected)
    {
        $this->faresCollected = $faresCollected;

        return $this;
    }

    /**
     * Get faresCollected
     *
     * @return integer 
     */
    public function getFaresCollected()
    {
        return $this->faresCollected;
    }

    /**
     * Set tipsCollected
     *
     * @param integer $tipsCollected
     * @return DriverPayroll
     */
    public function setTipsCollected($tipsCollected)
    {
        $this->tipsCollected = $tipsCollected;

        return $this;
    }

    /**
     * Get tipsCollected
     *
     * @return integer 
     */
    public function getTipsCollected()
    {
        return $this->tipsCollected;
    }
}
