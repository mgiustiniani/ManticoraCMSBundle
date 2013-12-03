<?php
namespace Manticora\CMSBundle\Service\Routing;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use Doctrine\ORM\EntityManager,
    Symfony\Component\Routing\RouteCollection,
    Symfony\Component\Routing\Route,
    Symfony\Component\Config\Loader\Loader as BaseLoader;

/**
 * Description of Loader
 *
 * @author mgiustiniani
 */
class Loader extends BaseLoader
{
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

    public function load($resource, $type = null)
    {
        $tree = $this->em->getRepository('ManticoraCMSBundle:RouteCollection');
        $collection = new RouteCollection();

        foreach ($tree->getRootNodes() as $node) {
            $collection = $this->addNode($collection, $node);
        }
        return $collection;
    }

    public function addNode(RouteCollection $routeCollection, \Manticora\CMSBundle\Entity\RouteCollection $route)
    {
        $collection = new RouteCollection();

        //  $collection->addPrefix($route->getPrefix());
        //  if($route->getHost())

        foreach ($route->getChildren() as $node) {
            $collection = $this->addNode($collection, $node);
        }

        foreach ($route->getRoutes() as $rotta) {
//            if ($rotta instanceof \Manticora\CMSBundle\Entity\ColdfusionProxy) {
//                $temp = new Route ($rotta->getPath(), array(
//                    '_controller' => 'EuropcarWebSitesBundle:ColdfusionProxy:index',
//                    'template' => $rotta->getTemplate()->getName()
//                ));
//                $collection->add('Coldfusion' . $rotta->getName(), $temp);
//            } else
            if ($rotta instanceof \Manticora\CMSBundle\Entity\StaticRoute) {

                $temp = new Route ($rotta->getPath(), array(
                    '_controller' => 'FrameworkBundle:Template:template',
                    'template' => $rotta->getTemplate()->getName()
                ));


                $collection->add($rotta->getName(), $temp);
                //  if($route->getHost())
            }


        }
        if ($route->getChildren()->isEmpty()) {
            $collection->setHost($route->getFullHost());
        }
        $routeCollection->addCollection($collection);
        return $routeCollection;

    }

    public function supports($resource, $type = null)
    {
        return 'db' === $type;
    }
}

?>
