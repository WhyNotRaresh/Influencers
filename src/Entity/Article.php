<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="articles")
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="id_article")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime", name="publishing_date")
     */
    private $date;

    /**
     * @ORM\JoinColumn(name="id_author", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="id")
     */
    private $author;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="article_list")
     * @ORM\JoinTable(name="articles_tags_joining_table")
     */
    private $tagList;

    public function __construct() {
        $this->id = -1;
        $this->title = null;
        $this->content = null;
        $this->date = null;
        $this->author = new ArrayCollection();
        $this->tagList = new ArrayCollection();
    }
}