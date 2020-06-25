<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Authors
 *
 * @ORM\Table(name="authors", uniqueConstraints={@ORM\UniqueConstraint(name="mail", columns={"mail"}), @ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity
 */
class Authors
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
     * @var int
     *
     * @ORM\Column(name="number_likes", type="integer", nullable=false, options={"default" : 0})
     */
    private $numberLikes = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Articles", mappedBy="author")
     */
    private $articleList;

    public function __construct() {
        $this->articleList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

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
            $articleList->setAuthorId($this);
        }

        return $this;
    }

    public function removeArticleList(Articles $articleList): self
    {
        if ($this->articleList->contains($articleList)) {
            $this->articleList->removeElement($articleList);
            // set the owning side to null (unless already changed)
            if ($articleList->getAuthorId() === $this) {
                $articleList->setAuthorId(null);
            }
        }

        return $this;
    }
}
