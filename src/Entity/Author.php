<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="authors")
 */
class Author
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_author")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberLikes;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $mail;

    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="author")
     */
    private $articles;

    public function __constructor() {
        $id = -1;
        $numberLikes = 0;
        $name = null;
        $mail = null;
        $this->articles = new ArrayCollection();
    }
}