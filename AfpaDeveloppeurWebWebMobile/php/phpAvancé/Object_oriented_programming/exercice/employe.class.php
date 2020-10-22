<?php


class Employe 
{
    // TODO: rajouter l'Id
    protected $nom;
    protected $prenom;
    protected $dateEmbauche;
    protected $fonction;
    protected $salaire;
    protected $service;
    protected $numeroAgence;

    // Méthode qui permet d'effectuer l'ensemble des setters lors de la création d'un nouvel objet.
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key); // ucfirst() permet de mettre en majuscule la première lettre

            if (method_exists($this, $method)) // On vérifie que la méthode existe, et si elle existe on l'exécute.
            {
                $this->$method($value); // On appelle le setter.
            }
        }
    }

    // public function __construct($nom, $prenom, $dateEmbauche, $fonction, $salaire, $service, $numeroAgence) // Constructeur demandant 2 paramètres
    // {
    //     $this->setNom($nom);
    //     $this->setPrenom($prenom);
    //     $this->setDateEmbauche($dateEmbauche);
    //     $this->setFonction($fonction);
    //     $this->setSalaire($salaire);
    //     $this->setService($service);
    //     $this->setNumeroAgence($numeroAgence);
    // }

    // Liste des getters
    public function getNom(){ return $this->nom; }
    public function getPrenom(){ return $this->prenom; }
    public function getDateEmbauche(){ return $this->dateEmbauche; }
    public function getFonction(){ return $this->fonction; }
    public function getSalaire(){ return $this->salaire; }
    public function getService(){ return $this->service; }
    public function getNumeroAgence(){ return $this->numeroAgence; }

    // Liste des setters
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setDateEmbauche($dateEmbauche)
    {
        $this->dateEmbauche = $dateEmbauche;
    }

    public function setFonction($fonction)
    {
        $this->fonction = $fonction;
    }

    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    }

    public function setService($service)
    {
        $this->service = $service;
    }

    public function setNumeroAgence($numeroAgence)
    {
    $this->numeroAgence = $numeroAgence;
    }

}
