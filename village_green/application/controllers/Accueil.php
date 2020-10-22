<?php
	
    // application/controllers/Produits.php
        
    defined('BASEPATH') OR exit('No direct script access allowed');
        

    class Accueil extends CI_Controller 
    {
        public function index()
        {
            $this->load->view('home');
        }

        public function formulaire()
        {
            $this->load->view('form');
        }
    }
?>