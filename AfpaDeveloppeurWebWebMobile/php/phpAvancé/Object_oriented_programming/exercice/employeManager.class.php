<?php
// TODO: Voir si je peux déplacer l'attribut ancienneté dans la classe Employe ?
    class EmployeManager
    {
        private $_db; // Instance de PDO
        private $_annciennete;
        protected $chequesVacances;
        
        // Méthode permettant d'attribuer la connexion à l'objet
        public function __construct($db)
        {
            $this->setDb($db);
        }
        
        // list getters

        public function getAnciennete(){ return $this->_anciennete; }
        public function getChequesVancances(){ return $this->chequesVacances; }

        // Liste setters

            // Méthode qui modifie l'attribut $_db de l'objet créé
            public function setDb(PDO $db)
            {
                $this->_db = $db;
            }

            // Méthode qui modifie l'attribut $_ancienneté de l'objet crée
            public function setAnciennete($date)
            {
                $dateEmbauche = date_create(date("d-m-Y", strtotime($date))); //Permet de créer un objet dateEmbauche
                $today = date_create(date("d-m-Y", time())); // permet de récupérer la date d'aujourd'hui au format jour-mois-année
                $dateDiff = date_diff($today, $dateEmbauche); // permet de calculer la différence entre les deux dates
                
                return $this->_anciennete = $dateDiff->format('%Y'); //on modifie l'attribut $_anciennete en lui injectant uniquement le nombre d'année(s) 
            }

            public function setChequesVacances($chequesVacances)
            {
                $this->chequesVacances = $chequesVacances;
            }



        // Autres méthodes :

        // Méthode qui permet d'ajouter un employé
        public function add(employe $employe)
        {
            $q = $this->_db->prepare('INSERT INTO employes(`nom`,`prenom`,`dateEmbauche`,`fonction`,`salaire`,`service`) VALUES(:nom, :prenom, :dateEmbauche, :fonction, :salaire, :service)');

            $q->bindValue(':nom', $employe->getNom());
            $q->bindValue(':prenom', $employe->getPrenom());
            $q->bindValue(':dateEmbauche', $employe->getDateEmbauche());
            $q->bindValue(':fonction', $employe->getFonction());
            $q->bindValue(':salaire', $employe->getSalaire(), PDO::PARAM_INT);
            $q->bindValue(':service', $employe->getService());

            $q->execute();
        }

        // Méthode qui permet d'ajouter un employé
        public function delete(Employe $employe)
        {
            $this->_db->exec('DELETE FROM employes WHERE id = '.$employe->getId());
        }

        // Méthode qui permet de sélectionner un employé
        public function get($id)
        {
            $id = (int) $id;

            $q = $this->_db->query('SELECT id, nom, prenom, dateEmbauche, fonction, salaire, service FROM employes WHERE id = '.$id);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);

            return new Employe($donnees);
        }

        // Méthode qui permet de retourner une liste détaillée (triée par Nom puis Prénom) de l'ensemble des employés 
        public function listTrieNomPrenom()
        {
            // $employe = [];

            $request = $this->_db->query('SELECT id, nom, prenom, dateEmbauche, fonction, salaire, service FROM employes ORDER BY nom ASC, prenom ASC');

            while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
            {
                // $employe[] = new Employe($donnees);
                echo $donnees['prenom'].' '.$donnees['nom'].' est arrivé le '.date("d-m-Y", strtotime($donnees['dateEmbauche'])).' dans l\'entreprise à la fonction de '.$donnees['fonction'].' au service '.$donnees['service'].'. Il sera rémunéré à hauteur de '.$donnees['salaire'].'k euros brut annuel.<br>'; 
            // strtotime permet de transformer un objet de type string en timestamp.
            }

            // return $employe;
        }

        // Méthode qui permet de retourner une liste détaillée (triée par Service, puis par Nom et par Prénom) de l'ensemble des employés 
        public function listTrieServiceNomPrenom()
        {
            // $employe = [];

            $request = $this->_db->query('SELECT id, nom, prenom, dateEmbauche, fonction, salaire, service FROM employes ORDER BY service ASC, nom ASC, prenom ASC');

            while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
            {
                // $employe[] = new Employe($donnees);
                echo $donnees['prenom'].' '.$donnees['nom'].' est arrivé le '.date("d-m-Y", strtotime($donnees['dateEmbauche'])).' dans l\'entreprise à la fonction de '.$donnees['fonction'].' au service '.$donnees['service'].'. Il sera rémunéré à hauteur de '.$donnees['salaire'].'k euros brut annuel.<br>'; 
            }

            // return $employe;
        }

        // Méthode qui permet de modifier les données d'un employé
        public function update(Employe $employe)
        {
            $q = $this->_db->prepare('UPDATE employes SET nom = :nom, prenom = :prenom, salaire = :salaire, fonction = :fonction, service = :service  WHERE id = :id');

            $q->bindValue(':nom', $employe->getNom());
            $q->bindValue(':prenom', $employe->getPrenom());
            $q->bindValue(':salaire', $employe->getSalaire(), PDO::PARAM_INT);
            $q->bindValue(':fonction', $employe->getFonction());
            $q->bindValue(':service', $employe->getService());

            $q->execute();
        }

        //  Méthode qui permet de compter le nombre d'employé présent dans l'entreprise
        public function countEmp()
        {
            $q = $this->_db->query('SELECT COUNT(id) FROM employes');
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            echo "L'entreprise se compose de ".$donnees["COUNT(id)"]." employés.";
        }

        
        // Méthode qui a pour but d'afficher l'ancienneté de l'ensemble des employés
        public function afficheAnciennete()
        {
            $q = $this->_db->query('SELECT nom, prenom, dateEmbauche FROM employes');
            while($row = $q->fetch(PDO::FETCH_OBJ))
            {
                $date = $row->dateEmbauche; // On définit une variable que l'on va mettre en paramètre
                EmployeManager::setAnciennete($date); //On appelle sur la class elle même la méthode setAnciennete() où l'on place la valeur que l'on souhaite traiter en paranmètre
                if ((EmployeManager::getAnciennete()) === '00') // On appelle sur la classe elle même, la méthode getAnciennete()
                {
                    echo $row->prenom." ".$row->nom." est dans l'enreprise depuis moins d'un an.<br>";
                }
                else
                {
                    echo $row->prenom." ".$row->nom." est dans l'enreprise depuis ".EmployeManager::getAnciennete()." an(s).<br>";
                }
            }
        }

        // Méthode qui permet de doner l'ordre à la banque d'effectuer le versement des primes 
        // Prime calculée en fonction du salaire et de l'ancienneté, et versées le 31/11 de chaque année
        public function primes()
        {
            $q = $this->_db->query('SELECT nom, prenom, salaire, dateEmbauche, fonction FROM employes');
            $today = date_create(date("d-m-Y", time())); //On va chercher la date d'aujourd'hui
            if (($today->format('d-m')) === '27-03' ) // condition pour verser les primes le 31 nomvembre de chaque année
            {
                echo "Veuillez verser l'ensemble des primes aux employés : <br>";
                while($row = $q->fetch(PDO::FETCH_OBJ))
                {
                    $date = $row->dateEmbauche;// On définit une variable que l'on va mettre en paramètre
                    EmployeManager::setAnciennete($date);//On appelle sur la class elle même la méthode setAnciennete() où l'on place la valeur que l'on souhaite traiter en paranmètre
        
                    if ((EmployeManager::getAnciennete()) === '00')// On appelle sur la classe elle même, la méthode getAnciennete()
                    {
                        echo $row->prenom." ".$row->nom." aura une prime de ".(($row->salaire*1000)*0.05)." € <br>";
                    }
                    else if ($row->fonction != 'Directeur')
                    {
                        echo $row->prenom." ".$row->nom." aura une prime de ".(($row->salaire*1000)*0.05)." € à laquelle il faudra rajouter la prime d'ancienneté qui s'élève a ".(($row->salaire*1000) * 0.02)*EmployeManager::getAnciennete()." €.<br>";
                    }
                    else
                    {
                        echo $row->prenom." ".$row->nom.", Directeur de l'entreprise, aura une prime de ".(($row->salaire*1000)*0.07)." € à laquelle il faudra rajouter la prime d'ancienneté qui s'élève a ".(($row->salaire*1000) * 0.03)*EmployeManager::getAnciennete()." €.<br>";

                    }
                }
            }
            else
            {
                Echo "Le jour de la prime n'est pas encore arrivé";
            }
        }

        // Méthode qui permet d'afficher le cout total de la masse salariale (salaire + prime)
        public function coutSalarial()
        {
            $coutSalarial = 0;
            $q = $this->_db->query('SELECT salaire, dateEmbauche FROM employes');
            while($row = $q->fetch(PDO::FETCH_OBJ))
            {
                $date = $row->dateEmbauche;
                EmployeManager::setAnciennete($date);
                $coutSalarial += ($row->salaire*1000)+(($row->salaire*1000)*0.05)+((($row->salaire*1000) * 0.02)*EmployeManager::getAnciennete($date));
            }
            echo  'Le coût de la masse salariale représente un montant total de '.$coutSalarial.' €.';
        }

        // Méthode qui va permettre de connaitre le mode de restauration de chacun des employés.
        public function typeRestauration()
        {
            $q = $this->_db->query('SELECT employes.nom, employes.prenom, agences.restauration FROM employes JOIN agences ON agences.id = employes.numeroAgence ORDER BY agences.nom');
            while($row = $q->fetch(PDO::FETCH_OBJ))
            {
                echo $row->nom." ".$row->prenom." dispose d'un mode de restauration suivant : ".$row->restauration.".<br>";
            }
        }

        public function distributionCheques()
        {
            $q = $this->_db->query('SELECT nom, prenom, dateEmbauche FROM employes');
            while($row = $q->fetch(PDO::FETCH_OBJ))
            {
                $date = $row->dateEmbauche; // On définit une variable que l'on va mettre en paramètre
                EmployeManager::setAnciennete($date);
                if ((EmployeManager::getAnciennete()) > '00')
                {
                    echo $row->prenom.' peut bénéfier des chèques vacances !<br>';
                }
                else
                {
                    $dateEmbauche = date_create(date("d-m-Y", strtotime($date))); //Permet de créer un objet dateEmbauche
                    $dateEmbauche-> modify("+1 year");
                    $today = date_create(date("d-m-Y", time())); // permet de récupérer la date d'aujourd'hui au format jour-mois-année
                    $dateDiff = date_diff($today, $dateEmbauche); // permet de calculer la différence entre les deux dates    
                    echo 'Il va falloir patienter '.$row->prenom.'! Il ne vous reste plus que '.$dateDiff->format('%a').' jours à attendre ! ;)<br>';
                }
            }
        }
    }
?>
