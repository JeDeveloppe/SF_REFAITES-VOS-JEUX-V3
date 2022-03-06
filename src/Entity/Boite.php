<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Boite
 *
 * @ORM\Table(name="boite")
 * @ORM\Entity
 */
class Boite
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
     * @ORM\Column(name="nom", type="string", length=919, nullable=false)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="editeur", type="string", length=30, nullable=true)
     */
    private $editeur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="annee", type="string", length=20, nullable=true)
     */
    private $annee;

    /**
     * @var string
     *
     * @ORM\Column(name="imageBlob", type="blob", length=0, nullable=false)
     */
    private $imageblob;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_livrable", type="boolean", nullable=false)
     */
    private $isLivrable;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_complet", type="boolean", nullable=false)
     */
    private $isComplet;

    /**
     * @var int|null
     *
     * @ORM\Column(name="poid_boite", type="integer", nullable=true)
     */
    private $poidBoite;

    /**
     * @var int|null
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nbr_joueurs", type="string", length=2, nullable=true)
     */
    private $nbrJoueurs;

    /**
     * @var int|null
     *
     * @ORM\Column(name="prix_ht", type="integer", nullable=true)
     */
    private $prixHt;

    /**
     * @var string
     *
     * @ORM\Column(name="is_deee", type="boolean", nullable=true)
     */
    private $isDeee;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", length=65535, nullable=false)
     */
    private $contenu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=true)
     */
    private $message;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_on_line", type="boolean", nullable=false)
     */
    private $isOnLine;

    /**
     * @var datetime_immutable
     *
     * @ORM\Column(name="created_at", type="datetime_immutable", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEditeur(): ?string
    {
        return $this->editeur;
    }

    public function setEditeur(?string $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(?string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getImageblob()
    {
        return $this->imageblob;
    }

    public function setImageblob($imageblob): self
    {
        $this->imageblob = $imageblob;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getIsLivrable(): ?bool
    {
        return $this->isLivrable;
    }

    public function setIsLivrable(bool $isLivrable): self
    {
        $this->isLivrable = $isLivrable;

        return $this;
    }

    public function getIsComplet(): ?bool
    {
        return $this->isComplet;
    }

    public function setIsComplet(bool $isComplet): self
    {
        $this->isComplet = $isComplet;

        return $this;
    }

    public function getPoidBoite(): ?int
    {
        return $this->poidBoite;
    }

    public function setPoidBoite(?int $poidBoite): self
    {
        $this->poidBoite = $poidBoite;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getNbrJoueurs(): ?string
    {
        return $this->nbrJoueurs;
    }

    public function setNbrJoueurs(?string $nbrJoueurs): self
    {
        $this->nbrJoueurs = $nbrJoueurs;

        return $this;
    }

    public function getPrixHt(): ?int
    {
        return $this->prixHt;
    }

    public function setPrixHt(?int $prixHt): self
    {
        $this->prixHt = $prixHt;

        return $this;
    }

    public function getIsDeee(): ?bool
    {
        return $this->isDeee;
    }

    public function setIsDeee(bool $isDeee): self
    {
        $this->isDeee = $isDeee;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getIsOnLine(): ?bool
    {
        return $this->isOnLine;
    }

    public function setIsOnLine(bool $isOnLine): self
    {
        $this->isOnLine = $isOnLine;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }


}
