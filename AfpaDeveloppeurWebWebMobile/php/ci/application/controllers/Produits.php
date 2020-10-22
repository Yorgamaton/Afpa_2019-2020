	
<?php
	
    // application/controllers/Produits.php
        
    defined('BASEPATH') OR exit('No direct script access allowed');
        
    class Produits extends CI_Controller 
    {
        public function liste()
        {
            // Déclaration du tableau associatif à tranmettre à la vue
            $aView = array();

            // Dans le tableau, on créé une donnée 'prénom' qui a pour valeur 'Dave'    
            $aView["prenom"] = "Dave"; 

            // Dans le tableau, on créé une donnée 'nom' qui a pour valeur 'Loper'    
            $aView["nom"] = "Loper";
            
            // Dans le tableau, on met une liste de produits d'ustensiles de jardinnerie
            $aProduits ["produits"] = array("Aramis", "Athos", "Clatronic", "Camping", "Green");   
            
            
            // Exemple pour créer la liste de produits jarditou
            // Charge la librairie 'database' et se connecte à la base de données (création d'un objet db)
            $this->load->database();
            
            // Exécute la requête 
            $results = $this->db->query("SELECT * FROM produits");  
            
            // Récupération des résultats    
            $aListe = $results->result();   
            
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue 
            $aViewProduits["liste_produits"] = $aListe;
            
            // On passe les tableaux en second argument de la méthode. Le "+" permet d'assigner plusieurs paramètres.
            $this->load->view('liste', $aView + $aProduits + $aViewProduits );
        }

        public function ajouter()
        {
            // Chargement de la librairie form 
            $this->load->helper('form', 'url');
            
            // Chargement de la librairie form_validation
            $this->load->library('form_validation'); 

            if ($this->input->post()) 
            { // 2ème appel de la page: traitement du formulaire
                $data = $this->input->post(); //permet de récupérer en une seule fois toutes les données envoyées par le formulaire. Equivaut au tableau $_POST en PHP natif.
                
                // ------------------------------ IMPORTANT ------------------------------
                // L'utilisation de $this->db->insert('produits', $data); nécessite que le nom des colonnes que le nom des colonnes soit identiques aux attributs "name"

                    // On peut ne pas vouloir supprimer un champ dont on a pas besoin avant l'insertion :
                        // unset($data["champPasEnBase"];
                    
                    // Ou au contraire, ajouter ou modifier des éléments :
                        // Ajout d'une date d'ajout que le formulaire ne contient pas
                            $data["pro_d_ajout"] = date("Y-m-d h:i:s");

                        // Transformation d'une information venant du formalaire
                        // par exemple forcer la référence d'un produit en majuscules
                            $pro_ref = $this->input->post("pro_ref");
                            $data["pro_ref"] = strtoupper($pro_ref);
                    
                // ------------------ Validation de formulaire ------------------

                // Permet de personnaliser le style des messages d'erreurs
                    $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width: 300px;">', '</div>');  
                        // -> 1er argument : balise HTML d'ouverture du message d'erreur.
                        // -> 2ème argument : balise HTML de fermeture.

                // Traitement des données rentrées dans le formulaire.
                    $this->form_validation->set_rules("pro_ref", "Référence", "required|min_length[6]", array("required" => "Le %s doit être obligatoire.",  "min_length" => "La %s doit avoir longueur minimum de 6 caractères."));                
                    // -> 1er argument : indique le champ de formulaire à contrôler, indiquer l'attribut name du <input> 
                    // -> 2ème argument : précise un nom/libellé désignant le champ ciblé, mieux compréhensible par l'humain que l'attribut name (nom trop "technique"). Ce libelleé apparaîtra dans le message d'erreur associé au champ.
                    // -> 3ème argument : le filtre de contrôle à appliquer. required remplace la condition qui serait if (empty($_POST["pro_ref"]) { ...
                        // Liste des filtres : https://codeigniter.com/userguide3/libraries/form_validation.html?highlight=forms#rule-reference
                    // Noter que la mention %s sera remplacé par la valeur du second argument. (valable que quand il y a un filtre)
                    // lorsqu'il y a plusieurs filtres, il faut les séparer par un pipe "|". Ici on requiert une valeur d'au moins 6 caractères.
                    
                    $this->form_validation->set_rules("pro_libelle", "Libellé", "required", array("required" => "Le %s doit être obligatoire."));                
                    $this->form_validation->set_rules("pro_cat_id", "Catégorie", "required", array("required" => "La %s doit être obligatoire."));                

                    if ($this->form_validation->run() == FALSE) 
                    //La méthode run() permet d'exécuter la vérification des filtres. 
                    // Elle retourne TRUE si la valeur est correct, sinon FALSE 
                    { // Echec de la validation, on réaffiche la vue formulaire 
                        $this->load->view('ajouter');
                    }
                    else // if ($this->form_validation->run() == TRUE)
                    { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base
                        $this->load->database(); // permet de se connecter à la base de données.
                        $this->db->insert('produits', $data); 
                        //génère et exécute une requête insert, le tableau $data contient les paramètres de la requête.
                            // -> Le premier argument est le nom de la table dans laquelle les données doivent être insérées. 
                            // -> Le second argument est le tableau contenant les données issues du formulaire (POST)
                        $this->load->helper('url'); //charge le module permettant d'utiliser la fonction redirect
                        redirect("produits/liste"); //redirige le navigateur vers la méthode liste du contrôleur produits. La méthode redirect() est disponible via le helper url.
                    }     
            } 
            else
            { // 1er appel de la page: affichage du formulaire
                $this->load->view('ajouter');  // Chargement de la vue 'ajout.php'
            }
        }
    }