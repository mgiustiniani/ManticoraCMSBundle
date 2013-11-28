<?php
namespace Manticora\CMSBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/** 
 * @ORM\Entity
 */
class Template
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", unique=true, nullable=true)
     */
    private $name;

    /** 
     * @ORM\Column(type="text", nullable=true)
     */
    private $body;

    /** 
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /** 
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /** 
     * @ORM\OneToMany(targetEntity="Manticora\CMSBundle\Entity\Route", mappedBy="Template")
     */
    private $Routes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->StaticRoutes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function __toString() {
        return $this->name;
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
     * @return Template
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
     * Set body
     *
     * @param string $body
     * @return Template
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Template
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Template
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add StaticRoutes
     *
     * @param \Manticora\CMSBundle\Entity\StaticRoute $staticRoutes
     * @return Template
     */
    public function addStaticRoute(\Manticora\CMSBundle\Entity\StaticRoute $staticRoutes)
    {
        $this->StaticRoutes[] = $staticRoutes;

        return $this;
    }

    /**
     * Remove StaticRoutes
     *
     * @param \Manticora\CMSBundle\Entity\StaticRoute $staticRoutes
     */
    public function removeStaticRoute(\Manticora\CMSBundle\Entity\StaticRoute $staticRoutes)
    {
        $this->StaticRoutes->removeElement($staticRoutes);
    }

    /**
     * Get StaticRoutes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStaticRoutes()
    {
        return $this->StaticRoutes;
    }

    /**
     * Add Routes
     *
     * @param \Manticora\CMSBundle\Entity\Route $routes
     * @return Template
     */
    public function addRoute(\Manticora\CMSBundle\Entity\Route $routes)
    {
        $this->Routes[] = $routes;
    
        return $this;
    }

    /**
     * Remove Routes
     *
     * @param \Manticora\CMSBundle\Entity\Route $routes
     */
    public function removeRoute(\Manticora\CMSBundle\Entity\Route $routes)
    {
        $this->Routes->removeElement($routes);
    }

    /**
     * Get Routes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoutes()
    {
        return $this->Routes;
    }
}