<?php

namespace MinimalOriginal\PageBundle;

use MinimalOriginal\CoreBundle\Modules\AbstractModule;

use MinimalOriginal\PageBundle\Form\PageType;
use MinimalOriginal\PageBundle\Entity\Page;
use MinimalOriginal\CoreBundle\Entity\EntityRoutedInterface;

class MinimalModule extends AbstractModule{

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

}
