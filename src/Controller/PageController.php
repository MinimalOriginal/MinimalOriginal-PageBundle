<?php

namespace MinimalOriginal\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MinimalOriginal\CoreBundle\Routing\Annotation\Route;

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

      // Définit les données SEO
      $seo = $this->container->get('minimal_seo');
      $seo->addTitle($data->getTitle())
      ->setDescription($data->getContent());

      return $this->render('MinimalPageBundle:Show:show.html.twig', array(
        'data' => $data,
      ));
    }
}
