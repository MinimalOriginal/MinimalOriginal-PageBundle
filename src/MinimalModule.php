<?php

namespace MinimalOriginal\PageBundle;

use MinimalOriginal\CoreBundle\Modules\ModuleInterface;
use MinimalOriginal\CoreBundle\Modules\ModuleRoutedInterface;

use MinimalOriginal\PageBundle\Form\PageType;
use MinimalOriginal\PageBundle\Entity\Page;
use MinimalOriginal\CoreBundle\Entity\EntityRoutedInterface;

class MinimalModule implements ModuleInterface, ModuleRoutedInterface{

  /**
   * {@inheritdoc}
   */
  public function getName(){
    return 'page';
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle(){
    return "Pages";
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription(){
    return "Créez ou modifiez les pages de votre site.";
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityClass(){
    return Page::class;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormTypeClass(){
    return PageType::class;
  }

  /**
   * {@inheritdoc}
   */
  public function getShowRoute(){
    return 'page_show';
  }

  /**
   * {@inheritdoc}
   */
  public function getShowRouteParams(EntityRoutedInterface $entity){
    return array('slug' => $entity->getSlug());
  }

  /**
   * {@inheritdoc}
   */
  public function getShowController(){
    return 'MinimalPageBundle:Page:show';
  }

  /**
   * {@inheritdoc}
   */
  public function getShowControllerParams(EntityRoutedInterface $entity){
    return array('slug' => $entity->getSlug());
  }

}
