<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActivityIncome
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ActivityIncomeRepository")
 */
class ActivityIncome
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
     * @ORM\Column(name="faresCollected", type="integer")
     */
    private $faresCollected;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipesCollected", type="integer")
     */
    private $tipesCollected;

    /**
     * @var integer
     *
     * @ORM\Column(name="tripsScheduled", type="integer")
     */
    private $tripsScheduled;

    /**
     * @var integer
     *
     * @ORM\Column(name="tripsNotScheduled", type="integer")
     */
    private $tripsNotScheduled;


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
     * Set faresCollected
     *
     * @param integer $faresCollected
     * @return ActivityIncome
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
     * Set tipesCollected
     *
     * @param integer $tipesCollected
     * @return ActivityIncome
     */
    public function setTipesCollected($tipesCollected)
    {
        $this->tipesCollected = $tipesCollected;

        return $this;
    }

    /**
     * Get tipesCollected
     *
     * @return integer 
     */
    public function getTipesCollected()
    {
        return $this->tipesCollected;
    }

    /**
     * Set tripsScheduled
     *
     * @param integer $tripsScheduled
     * @return ActivityIncome
     */
    public function setTripsScheduled($tripsScheduled)
    {
        $this->tripsScheduled = $tripsScheduled;

        return $this;
    }

    /**
     * Get tripsScheduled
     *
     * @return integer 
     */
    public function getTripsScheduled()
    {
        return $this->tripsScheduled;
    }

    /**
     * Set tripsNotScheduled
     *
     * @param integer $tripsNotScheduled
     * @return ActivityIncome
     */
    public function setTripsNotScheduled($tripsNotScheduled)
    {
        $this->tripsNotScheduled = $tripsNotScheduled;

        return $this;
    }

    /**
     * Get tripsNotScheduled
     *
     * @return integer 
     */
    public function getTripsNotScheduled()
    {
        return $this->tripsNotScheduled;
    }
}
