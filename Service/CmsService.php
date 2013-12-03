<?php
namespace Manticora\CMSBundle\Service;

use Doctrine\ORM\EntityManager;
use Manticora\CMSBundle\Entity\Route;
use Manticora\CMSBundle\Entity\Template;
use Symfony\Component\Config\Definition\Exception\Exception;
use Twig_Environment;

class CmsService
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * Constructor.
     *
     * @param \Doctrine\ORM\EntityManager $em the Doctrine Entity Manager
     * @param \Twig_Environment $twig the Twig Environment
     */
    public function __construct(\Doctrine\ORM\EntityManager $em, Twig_Environment $twig)
    {
        $this->em = $em;
        $this->twig = $twig;
    }

    public function removeRoute(Route $route) {
        $this->em->remove($route);
        $this->em->flush();
    }

    public function clearCache() {
        $this->twig->clearTemplateCache();
    }

    public function getTemplate($id) {
        return $this->em->getRepository('ManticoraCMSBundle:Template')->find($id);
    }

    public function renderTemplateFromString($twig_string, $params = array()) {
        return $this->twig->render($twig_string, $params);
    }

    public function renderTemplate($id, $params = array()) {
        if (!$template = $this->getTemplate($id)) {
            throw new Exception("Template $id not found");
        }

        return $this->renderTemplateFromString($template->getBody(), $params);
    }

    /**
     * @param Manticora\CMSBundle\Entity\Template template entity
     */
    public function saveTemplate(Template $template) {
        $this->em->persist($template);
        $this->em->flush();
        $this->clearCache();
    }

}