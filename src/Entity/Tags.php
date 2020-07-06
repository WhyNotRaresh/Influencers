<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tags
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity(repositoryClass="App\Repository\TagRepository")
 */
class Tags implements \JsonSerializable
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
     * @ORM\Column(name="tag_name", type="string", length=255, nullable=false)
     */
    private $tagName;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Articles", inversedBy="tagList")
     * @ORM\JoinTable(name="article_tags",
     *  joinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="article_id", referencedColumnName="id")})
     */
    private $articleList;

    public function __construct() {
        $this->articleList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTagName(): ?string
    {
        return $this->tagName;
    }

    public function setTagName(string $tagName): self
    {
        $this->tagName = $tagName;

        return $this;
    }

    /**
     * @return Collection|Articles[]
     */
    public function getArticleList(): Collection
    {
        return $this->articleList;
    }

    public function addArticleList(Articles $articleList): self
    {
        if (!$this->articleList->contains($articleList)) {
            $this->articleList[] = $articleList;
        }

        return $this;
    }

    public function removeArticleList(Articles $articleList): self
    {
        if ($this->articleList->contains($articleList)) {
            $this->articleList->removeElement($articleList);
        }

        return $this;
    }

	public function jsonSerialize() {
		return [
			"id" => $this->id,
			"tagName" => $this->tagName
		];
	}
}
