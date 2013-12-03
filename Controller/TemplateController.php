<?php

namespace Manticora\CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class templateController extends Controller
{
    public function previewAction(Request $request)
    {
        $cmsService = $this->container->get('manticora_cms.service');

        if (!$twig_string = $request->get('twig')) {
            throw $this->createNotFoundException('You must post the template string');
        }
        $params = ( $request->get('params') != null && is_array($request->get('params')) ? $request->get('params') : array() );

        return new Response($cmsService->renderTemplateFromString($twig_string));
    }

}
