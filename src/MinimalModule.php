<?php

namespace MinimalOriginal\PageBundle;

use MinimalOriginal\CoreBundle\Modules\AbstractManageableModule;

use MinimalOriginal\PageBundle\Form\PageType;
use MinimalOriginal\PageBundle\Entity\Page;

class MinimalModule extends AbstractManageableModule{

  /**
   * {@inheritdoc}
   */
  public function init(){
    $this->informations->set('name', 'page');
    $this->informations->set('title', 'Pages');
    $this->informations->set('description', "Créez ou modifiez les pages de votre site.");
    $this->informations->set('icon', "ion-ios-book-outline");
    return $this;
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
