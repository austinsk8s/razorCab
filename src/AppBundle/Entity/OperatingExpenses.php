<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OperatingExpenses
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\OperatingExpensesRepository")
 */
class OperatingExpenses
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
     * @ORM\Column(name="trips", type="integer")
     */
    private $trips;

    /**
     * @var integer
     *
     * @ORM\Column(name="milesDriven", type="integer")
     */
    private $milesDriven;

    /**
     * @var integer
     *
     * @ORM\Column(name="incomeEarnedMiles", type="integer")
     */
    private $incomeEarnedMiles;


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
     * Set trips
     *
     * @param integer $trips
     * @return OperatingExpenses
     */
    public function setTrips($trips)
    {
        $this->trips = $trips;

        return $this;
    }

    /**
     * Get trips
     *
     * @return integer 
     */
    public function getTrips()
    {
        return $this->trips;
    }

    /**
     * Set milesDriven
     *
     * @param integer $milesDriven
     * @return OperatingExpenses
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
     * Set incomeEarnedMiles
     *
     * @param integer $incomeEarnedMiles
     * @return OperatingExpenses
     */
    public function setIncomeEarnedMiles($incomeEarnedMiles)
    {
        $this->incomeEarnedMiles = $incomeEarnedMiles;

        return $this;
    }

    /**
     * Get incomeEarnedMiles
     *
     * @return integer 
     */
    public function getIncomeEarnedMiles()
    {
        return $this->incomeEarnedMiles;
    }
}
