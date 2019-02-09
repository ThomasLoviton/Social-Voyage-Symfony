<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity
 */
class Comment
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
     * @ORM\Column(name="idpost", type="integer", nullable=false)
     */
    private $idpost;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=0, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=false)
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="postedat", type="datetime", nullable=false)
     */
    private $postedat;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numberlike", type="integer", nullable=true)
     */
    private $numberlike = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdpost(): ?int
    {
        return $this->idpost;
    }

    public function setIdpost(int $idpost): self
    {
        $this->idpost = $idpost;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getPostedat(): ?\DateTimeInterface
    {
        return $this->postedat;
    }

    public function setPostedat(\DateTimeInterface $postedat): self
    {
        $this->postedat = $postedat;

        return $this;
    }

    public function getNumberlike(): ?int
    {
        return $this->numberlike;
    }

    public function setNumberlike(?int $numberlike): self
    {
        $this->numberlike = $numberlike;

        return $this;
    }


}
