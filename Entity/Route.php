<?php
namespace Manticora\CMSBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 * @ORM\Table(name="cms_route")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap(
 *     {"Coldfusion"="Manticora\CMSBundle\Entity\ColdfusionProxy","static"="Manticora\CMSBundle\Entity\StaticRoute"}
 * )
 */
class Route
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string")
     */
    private $name;

    /** 
     * @ORM\Column(type="string")
     */
    private $path;

    /** 
     * @ORM\ManyToOne(targetEntity="Manticora\CMSBundle\Entity\Template", inversedBy="routes")
     * @ORM\JoinColumn(name="template_id", referencedColumnName="id", nullable=false)
     */
    private $template;

    /** 
     * @ORM\ManyToOne(targetEntity="Manticora\CMSBundle\Entity\RouteCollection", inversedBy="routes")
     * @ORM\JoinColumn(name="route_collection_id", referencedColumnName="id", nullable=false)
     */
    private $routeCollection;


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
     * Set path
     *
     * @param string $path
     * @return Route
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

  

    /**
     * Set RouteCollection
     *
     * @param \Manticora\CMSBundle\Entity\RouteCollection $routeCollection
     * @return Route
     */
    public function setRouteCollection(\Manticora\CMSBundle\Entity\RouteCollection $routeCollection)
    {
        $this->routeCollection = $routeCollection;

        return $this;
    }

    /**
     * Get RouteCollection
     *
     * @return \Manticora\CMSBundle\Entity\RouteCollection 
     */
    public function getRouteCollection()
    {
        return $this->routeCollection;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Route
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
     * Set Template
     *
     * @param \Manticora\CMSBundle\Entity\Template $template
     * @return Route
     */
    public function setTemplate(\Manticora\CMSBundle\Entity\Template $template)
    {
        $this->template = $template;
    
        return $this;
    }

    /**
     * Get Template
     *
     * @return \Manticora\CMSBundle\Entity\Template 
     */
    public function getTemplate()
    {
        return $this->template;
    }
}