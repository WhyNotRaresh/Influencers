<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles", indexes={@ORM\Index(name="author_id", columns={"author_id"})})
 * @ORM\Entity
 */
class Articles
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text", length=65535, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=true)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publishing_date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $publishingDate = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="number_likes", type="integer", nullable=false, options={"default" : 0})
     */
    private $numberLikes = '0';

    /**
     * @var int|null
     *
     * @ORM\ManyToOne(targetEntity="Authors", inversedBy="articleList")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Tags", mappedBy="articleList")
     * @ORM\JoinTable(name="article_tags")
     */
    private $tagList;

    public function __construct() {
        $this->tagList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPublishingDate(): ?\DateTimeInterface
    {
        return $this->publishingDate;
    }

    public function setPublishingDate(\DateTimeInterface $publishingDate): self
    {
        $this->publishingDate = $publishingDate;

        return $this;
    }

    public function getNumberLikes(): ?int
    {
        return $this->numberLikes;
    }

    public function setNumberLikes(int $numberLikes): self
    {
        $this->numberLikes = $numberLikes;

        return $this;
    }

    public function getAuthor(): ?Authors
    {
        return $this->author;
    }

    public function setAuthor(?Authors $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection|Tags[]
     */
    public function getTagList(): Collection
    {
        return $this->tagList;
    }

    public function addTagList(Tags $tagList): self
    {
        if (!$this->tagList->contains($tagList)) {
            $this->tagList[] = $tagList;
            $tagList->addArticleList($this);
        }

        return $this;
    }

    public function removeTagList(Tags $tagList): self
    {
        if ($this->tagList->contains($tagList)) {
            $this->tagList->removeElement($tagList);
            $tagList->removeArticleList($this);
        }

        return $this;
    }
}
