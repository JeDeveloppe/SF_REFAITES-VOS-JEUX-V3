<?php

namespace App\Entity;

use App\Repository\OccasionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OccasionRepository::class)
 */
class Occasion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $priceHt;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $oldPriceHt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $information;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isNeuf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etatBoite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etatMateriel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $regleJeu;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isOnLine;

    /**
     * @ORM\ManyToOne(targetEntity=Boite::class, inversedBy="occasions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $boite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $donation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sale;

    /**
     * @ORM\OneToMany(targetEntity=Panier::class, mappedBy="occasion")
     */
    private $paniers;

    /**
     * @ORM\OneToMany(targetEntity=DocumentLignes::class, mappedBy="occasion")
     */
    private $documentLignes;

    public function __construct()
    {
        $this->paniers = new ArrayCollection();
        $this->documentLignes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPriceHt(): ?string
    {
        return $this->priceHt;
    }

    public function setPriceHt(string $priceHt): self
    {
        $this->priceHt = $priceHt;

        return $this;
    }

    public function getOldPriceHt(): ?string
    {
        return $this->oldPriceHt;
    }

    public function setOldPriceHt(?string $oldPriceHt): self
    {
        $this->oldPriceHt = $oldPriceHt;

        return $this;
    }

    public function getInformation(): ?string
    {
        return $this->information;
    }

    public function setInformation(?string $information): self
    {
        $this->information = $information;

        return $this;
    }

    public function getIsNeuf(): ?bool
    {
        return $this->isNeuf;
    }

    public function setIsNeuf(bool $isNeuf): self
    {
        $this->isNeuf = $isNeuf;

        return $this;
    }

    public function getEtatBoite(): ?string
    {
        return $this->etatBoite;
    }

    public function setEtatBoite(string $etatBoite): self
    {
        $this->etatBoite = $etatBoite;

        return $this;
    }

    public function getEtatMateriel(): ?string
    {
        return $this->etatMateriel;
    }

    public function setEtatMateriel(string $etatMateriel): self
    {
        $this->etatMateriel = $etatMateriel;

        return $this;
    }

    public function getRegleJeu(): ?string
    {
        return $this->regleJeu;
    }

    public function setRegleJeu(string $regleJeu): self
    {
        $this->regleJeu = $regleJeu;

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

    public function getBoite(): ?Boite
    {
        return $this->boite;
    }

    public function setBoite(?Boite $boite): self
    {
        $this->boite = $boite;

        return $this;
    }

    public function getDonation(): ?string
    {
        return $this->donation;
    }

    public function setDonation(?string $donation): self
    {
        $this->donation = $donation;

        return $this;
    }

    public function getSale(): ?string
    {
        return $this->sale;
    }

    public function setSale(?string $sale): self
    {
        $this->sale = $sale;

        return $this;
    }

    /**
     * @return Collection<int, Panier>
     */
    public function getPaniers(): Collection
    {
        return $this->paniers;
    }

    public function addPanier(Panier $panier): self
    {
        if (!$this->paniers->contains($panier)) {
            $this->paniers[] = $panier;
            $panier->setOccasion($this);
        }

        return $this;
    }

    public function removePanier(Panier $panier): self
    {
        if ($this->paniers->removeElement($panier)) {
            // set the owning side to null (unless already changed)
            if ($panier->getOccasion() === $this) {
                $panier->setOccasion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DocumentLignes>
     */
    public function getDocumentLignes(): Collection
    {
        return $this->documentLignes;
    }

    public function addDocumentLigne(DocumentLignes $documentLigne): self
    {
        if (!$this->documentLignes->contains($documentLigne)) {
            $this->documentLignes[] = $documentLigne;
            $documentLigne->setOccasion($this);
        }

        return $this;
    }

    public function removeDocumentLigne(DocumentLignes $documentLigne): self
    {
        if ($this->documentLignes->removeElement($documentLigne)) {
            // set the owning side to null (unless already changed)
            if ($documentLigne->getOccasion() === $this) {
                $documentLigne->setOccasion(null);
            }
        }

        return $this;
    }
}
