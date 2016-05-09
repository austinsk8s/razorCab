<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarHours
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CarHoursRepository")
 */
class CarHours
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
     * @var integer
     *
     * @ORM\Column(name="hoursIdle", type="integer")
     */
    private $hoursIdle;

    /**
     * @var integer
     *
     * @ORM\Column(name="hoursDownServicing", type="integer")
     */
    private $hoursDownServicing;

    /**
     * @var integer
     *
     * @ORM\Column(name="hoursRun", type="integer")
     */
    private $hoursRun;

    /**
     * @var integer
     *
     * @ORM\Column(name="hoursIncome", type="integer")
     */
    private $hoursIncome;


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
     * Set hoursIdle
     *
     * @param integer $hoursIdle
     * @return CarHours
     */
    public function setHoursIdle($hoursIdle)
    {
        $this->hoursIdle = $hoursIdle;

        return $this;
    }

    /**
     * Get hoursIdle
     *
     * @return integer 
     */
    public function getHoursIdle()
    {
        return $this->hoursIdle;
    }

    /**
     * Set hoursDownServicing
     *
     * @param integer $hoursDownServicing
     * @return CarHours
     */
    public function setHoursDownServicing($hoursDownServicing)
    {
        $this->hoursDownServicing = $hoursDownServicing;

        return $this;
    }

    /**
     * Get hoursDownServicing
     *
     * @return integer 
     */
    public function getHoursDownServicing()
    {
        return $this->hoursDownServicing;
    }

    /**
     * Set hoursRun
     *
     * @param integer $hoursRun
     * @return CarHours
     */
    public function setHoursRun($hoursRun)
    {
        $this->hoursRun = $hoursRun;

        return $this;
    }

    /**
     * Get hoursRun
     *
     * @return integer 
     */
    public function getHoursRun()
    {
        return $this->hoursRun;
    }

    /**
     * Set hoursIncome
     *
     * @param integer $hoursIncome
     * @return CarHours
     */
    public function setHoursIncome($hoursIncome)
    {
        $this->hoursIncome = $hoursIncome;

        return $this;
    }

    /**
     * Get hoursIncome
     *
     * @return integer 
     */
    public function getHoursIncome()
    {
        return $this->hoursIncome;
    }
}
