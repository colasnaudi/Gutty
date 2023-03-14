<?php

class LivreEtape
{

    public array $listeEtapes = array();

    public function __construct(array $listeEtapes)
    {
        $this->listeEtapes = $listeEtapes;
    }

    public function setListeEtapes(array $listeEtapes): void
    {
        $this->listeEtapes = $listeEtapes;
    }

    public function getListeEtapes(): array
    {
        return $this->listeEtapes;
    }
}