<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emps
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\EmpsRepository")
 */
class Emps
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
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Desgination", type="string", length=255)
     */
    private $desgination;

    /**
     * @var string
     *
     * @ORM\Column(name="Salary", type="string", length=255)
     */
    private $salary;

    /**
     * @var string
     *
     * @ORM\Column(name="Mobile", type="string", length=255)
     */
    private $mobile;


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
     *
     * @return Emps
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
     * Set desgination
     *
     * @param string $desgination
     *
     * @return Emps
     */
    public function setDesgination($desgination)
    {
        $this->desgination = $desgination;

        return $this;
    }

    /**
     * Get desgination
     *
     * @return string
     */
    public function getDesgination()
    {
        return $this->desgination;
    }

    /**
     * Set salary
     *
     * @param string $salary
     *
     * @return Emps
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get salary
     *
     * @return string
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return Emps
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }
}

