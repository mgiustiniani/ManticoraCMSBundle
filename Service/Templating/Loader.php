<?php
namespace Manticora\CMSBundle\Service\Templating;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Loader
 *
 * @author mgiustiniani
 */
 class Loader implements \Twig_LoaderInterface, \Twig_ExistsLoaderInterface {
        /**
     * 
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * Constructor.
     *
     * @param \Doctrine\ORM\EntityManager $em the Doctrine Entity Manager
     */
    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function exists($name) {
        return is_object($this->getTemplate($name));
    }

    public function getCacheKey($name) {
        return $name;
    }

    public function getSource($name) {
               if (false === $source = $this->getTemplate($name)->getBody()) {
            throw new Twig_Error_Loader(sprintf('Template "%s" does not exist.', $name));
        }

        return $source;
    }

    public function isFresh($name, $time) {
         if (false === $lastModified = $this->getTemplate($name)->getUpdatedAt()->getTimestamp()) {
            return false;
        }

        return $lastModified <= $time;
    }
    
    public function getTemplate($name) {
        return $this->em->getRepository('ManticoraCMSBundle:Template')->findOneByName($name);
    }

}

?>
