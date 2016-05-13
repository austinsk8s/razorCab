<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DailyOperatingExpenses
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DailyOperatingExpensesRepository")
 */
class DailyOperatingExpenses
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
     * @ORM\Column(name="fuelUsed", type="integer")
     */
    private $fuelUsed;

    /**
     * @var integer
     *
     * @ORM\Column(name="milesDriven", type="integer")
     */
    private $milesDriven;

    /**
     * @var string
     *
     * @ORM\Column(name="repairs", type="string", length=255)
     */
    private $repairs;

    /**
     * @var string
     *
     * @ORM\Column(name="maintenance", type="string", length=255)
     */
    private $maintenance;

    /**
     * @var string
     *
     * @ORM\Column(name="supplies", type="string", length=255)
     */
    private $supplies;

    /**
     * @var string
     *
     * @ORM\Column(name="otherExpenses", type="string", length=255)
     */
    private $otherExpenses;


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
     * Set fuelUsed
     *
     * @param integer $fuelUsed
     * @return DailyOperatingExpenses
     */
    public function setFuelUsed($fuelUsed)
    {
        $this->fuelUsed = $fuelUsed;

        return $this;
    }

    /**
     * Get fuelUsed
     *
     * @return integer 
     */
    public function getFuelUsed()
    {
        return $this->fuelUsed;
    }

    /**
     * Set milesDriven
     *
     * @param integer $milesDriven
     * @return DailyOperatingExpenses
     */
    public function setMilesDriven($milesDriven)
    {
        $this->milesDriven = $milesDriven;

        return $this;
    }

    /**
     * Get milesDriven
     *
     * @return integer 
     */
    public function getMilesDriven()
    {
        return $this->milesDriven;
    }

    /**
     * Set repairs
     *
     * @param string $repairs
     * @return DailyOperatingExpenses
     */
    public function setRepairs($repairs)
    {
        $this->repairs = $repairs;

        return $this;
    }

    /**
     * Get repairs
     *
     * @return string 
     */
    public function getRepairs()
    {
        return $this->repairs;
    }

    /**
     * Set maintenance
     *
     * @param string $maintenance
     * @return DailyOperatingExpenses
     */
    public function setMaintenance($maintenance)
    {
        $this->maintenance = $maintenance;

        return $this;
    }

    /**
     * Get maintenance
     *
     * @return string 
     */
    public function getMaintenance()
    {
        return $this->maintenance;
    }

    /**
     * Set supplies
     *
     * @param string $supplies
     * @return DailyOperatingExpenses
     */
    public function setSupplies($supplies)
    {
        $this->supplies = $supplies;

        return $this;
    }

    /**
     * Get supplies
     *
     * @return string 
     */
    public function getSupplies()
    {
        return $this->supplies;
    }

    /**
     * Set otherExpenses
     *
     * @param string $otherExpenses
     * @return DailyOperatingExpenses
     */
    public function setOtherExpenses($otherExpenses)
    {
        $this->otherExpenses = $otherExpenses;

        return $this;
    }

    /**
     * Get otherExpenses
     *
     * @return string 
     */
    public function getOtherExpenses()
    {
        return $this->otherExpenses;
    }
}
