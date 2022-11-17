class Recette:
    def __init__(self, idRecette, nomRecette, etapesRecette, imagesRecette, temps, etat, nbPersonnes, prixAjout, prixSacADos, listeIngredientsRecette):
        self.idRecette = idRecette
        self.nomRecette = nomRecette
        self.etapesRecette = etapesRecette
        self.imagesRecette = imagesRecette
        self.temps = temps
        self.etat = etat
        self.nbPersonnes = nbPersonnes
        self.prixAjout = prixAjout
        self.prixSacADos = prixSacADos
        self.listeIngredientsRecette = listeIngredientsRecette
        