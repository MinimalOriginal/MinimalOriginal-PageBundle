<?php

namespace MinimalOriginal\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/page")
 */
class PageController extends Controller
{
    /**
     * @Route("/{slug}", name="minimal_page_show")
     */
    public function showAction($slug)
    {
      $repository = $this->getDoctrine()->getRepository('MinimalOriginal\PageBundle\Entity\Page');
      $data = $repository->findOneBy(array('slug'=>$slug));
      if( null === $data ){
        throw new NotFoundHttpException("cette page n'existe pas.");
      }
      return $this->render('MinimalPageBundle:Show:show.html.twig', array(
        'data' => $data,
      ));
    }
}
