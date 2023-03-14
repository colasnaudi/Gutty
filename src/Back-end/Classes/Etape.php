<?php

class Etape
{
    private int $NumEtape;
    private int $idRecette;
    private string $Texte;

    public function __construct(int $NumEtape, int $idRecette, string $Texte)
    {
        $this->NumEtape = $NumEtape;
        $this->idRecette = $idRecette;
        $this->Texte = $Texte;
    }

    public function getNumEtape(): int
    {
        return $this->NumEtape;
    }

    public function getIdRecette(): int
    {
        return $this->idRecette;
    }

    public function getTexte(): string
    {
        return $this->Texte;
    }

    public function setNumEtape(int $NumEtape): void
    {
        $this->NumEtape = $NumEtape;
    }

    public function setIdRecette(int $idRecette): void
    {
        $this->idRecette = $idRecette;
    }

    public function setTexte(string $Texte): void
    {
        $this->Texte = $Texte;
    }

}