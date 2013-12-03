<?php
namespace Manticora\CMSBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/** 
 * @ORM\Entity(repositoryClass="Gedmo\Tree\Entity\Repository\NestedTreeRepository")
 * @ORM\Table(name="cms_route_collection")
 * @Gedmo\Tree(type="nested")
 */
class RouteCollection
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;
    /** 
     * @ORM\Column(type="string", nullable=true)
     */
    private $prefix;

    /** 
     * 
     @ORM\OneToMany(targetEntity="Manticora\CMSBundle\Entity\Route", mappedBy="RouteCollection")*/
    private $Routes;

    /** 
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="Manticora\CMSBundle\Entity\RouteCollection", inversedBy="children")
     * @ORM\JoinColumn(name="route_collection_id", referencedColumnName="id")
     */
    private $parent;

    /** 
     * 
     @ORM\OneToMany(targetEntity="Manticora\CMSBundle\Entity\RouteCollection", mappedBy="parent")*/
    private $children;

    /** 
     * @ORM\Column(type="string", nullable=true)
     */
    private $host;

/**
     * @Gedmo\TreeLeft
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lft;

    /**
     * @Gedmo\TreeLevel
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $lvl;


    /**
     * @Gedmo\TreeRight
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rgt;

    /**
     * @Gedmo\TreeRoot
     * @ORM\Column(type="integer", nullable=true)
     */
    private $root;

    
    
   

    
    public function __toString() {
        if($this->host == null && $this->prefix == null) return $this->title;
        return $this->host.$this->prefix;
    }
    /**
     * Set prefix
     *
     * @param string $prefix
     * @return RouteCollection
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Get prefix
     *
     * @return string 
     */
    public function getPrefix()
    {
        return $this->prefix;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Routes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set host
     *
     * @param string $host
     * @return RouteCollection
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return string 
     */
    public function getHost()
    {
       return $this->host;
        
    }
    
    public function getFullHost() {
        return $this->host.(isset($this->parent)?$this->parent ->getHost():'');
    }

    /**
     * Set lft
     *
     * @param integer $lft
     * @return RouteCollection
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft
     *
     * @return integer 
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set lvl
     *
     * @param integer $lvl
     * @return RouteCollection
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer 
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Set rgt
     *
     * @param integer $rgt
     * @return RouteCollection
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt
     *
     * @return integer 
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set root
     *
     * @param integer $root
     * @return RouteCollection
     */
    public function setRoot($root)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * Get root
     *
     * @return integer 
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Add Routes
     *
     * @param \Manticora\CMSBundle\Entity\Route $routes
     * @return RouteCollection
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

    /**
     * Set parent
     *
     * @param \Manticora\CMSBundle\Entity\RouteCollection $parent
     * @return RouteCollection
     */
    public function setParent(\Manticora\CMSBundle\Entity\RouteCollection $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Manticora\CMSBundle\Entity\RouteCollection 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add children
     *
     * @param \Manticora\CMSBundle\Entity\RouteCollection $children
     * @return RouteCollection
     */
    public function addChild(\Manticora\CMSBundle\Entity\RouteCollection $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Manticora\CMSBundle\Entity\RouteCollection $children
     */
    public function removeChild(\Manticora\CMSBundle\Entity\RouteCollection $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return RouteCollection
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }



    /**
     * Add children
     *
     * @param \Manticora\CMSBundle\Entity\RouteCollection $children
     * @return RouteCollection
     */
    public function addChildren(\Manticora\CMSBundle\Entity\RouteCollection $children)
    {
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param \Manticora\CMSBundle\Entity\RouteCollection $children
     */
    public function removeChildren(\Manticora\CMSBundle\Entity\RouteCollection $children)
    {
        $this->children->removeElement($children);
    }
}