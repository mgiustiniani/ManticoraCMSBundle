<?php
namespace Manticora\CMSBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/** 
 * @ORM\Entity
 * @ORM\Table(name="cms_template_category")
 */
class TemplateCategory
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
     * @ORM\OneToMany(targetEntity="Manticora\CMSBundle\Entity\Template", mappedBy="category", cascade={"persist"})
     */
    private $templates;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->templates = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add templates
     *
     * @param \Manticora\CMSBundle\Entity\Template $templates
     * @return TemplateCategory
     */
    public function addTemplate(\Manticora\CMSBundle\Entity\Template $templates)
    {
        $this->templates[] = $templates;
    
        return $this;
    }

    /**
     * Remove templates
     *
     * @param \Manticora\CMSBundle\Entity\Template $templates
     */
    public function removeTemplate(\Manticora\CMSBundle\Entity\Template $templates)
    {
        $this->templates->removeElement($templates);
    }

    /**
     * Get templates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTemplates()
    {
        return $this->templates;
    }
}