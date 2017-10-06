<?php

namespace MinimalOriginal\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use MinimalOriginal\CoreBundle\Entity\EntityRoutedInterface;
use MinimalOriginal\CoreBundle\Annotation\Exposure;

/**
 * Page
 *
 * @Gedmo\Tree(type="nested")
 * @ORM\Table(name="page")
 * @ORM\Entity(repositoryClass="Gedmo\Tree\Entity\Repository\NestedTreeRepository")
 */
class Page implements EntityRoutedInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Exposure(groups = {"manager"}, name = "Titre")
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"title"}, updatable=false, separator="-")
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var \DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var \DateTime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @Exposure(groups = {"manager"}, name = "Date de miseà jour")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @Gedmo\TreeLeft
     * @ORM\Column(type="integer")
     */
    private $lft;

    /**
     * @Gedmo\TreeLevel
     * @ORM\Column(type="integer")
     */
    private $lvl;

    /**
     * @Gedmo\TreeRight
     * @ORM\Column(type="integer")
     */
    private $rgt;

    /**
     * @Gedmo\TreeRoot
     * @ORM\ManyToOne(targetEntity="Page")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $root;

    /**
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="children")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="Page", mappedBy="parent")
     * @ORM\OrderBy({"lft" = "ASC"})
     */
    private $children;

    public function __toString(){
      return $this->getTitle();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Page
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Page
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Page
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get created date
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Get updated date
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Get root page
     *
     * @return null|Page
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Get set parent page
     *
     * @param null|Page $parent
     *
     */
    public function setParent(Page $parent = null)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent page
     *
     * @return null|Page
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * {@inheritdoc}
     */
     public function getShowRoute(){
       return array(
         'route' => 'minimal_page_show',
         'params' => array('slug' => $this->getSlug()),
       );
     }
}
