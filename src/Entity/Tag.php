<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tags")
 */
class Tag
{
    /**
     * @ORM\Column(type="string")
     */
    private $tagName;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="Article", mappedBy="tag_list")
     */
    private $articleList;

    public function __construct() {
        $this->tagName = null;
        $this->id = -1;
        $this->articleList = new ArrayCollection();
    }
}