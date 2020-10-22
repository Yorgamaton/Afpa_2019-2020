<?php
    include("header.php");    
?>

    <!-- Form  -->
    <!-- Method to collect informations in the form -->
    <form id="contact" action="formVerif.php" method="POST">
        <!-- Message to specify what is necessary in the form -->
        <div class="alert alert-secondary mt-1" role="alert">
            * Ces zones sont obligatoires
        </div>

        <fieldset>
            <legend>Vos coordonnées :</legend>
            <!-- Last name and first name -->
            <div class="form-group row">
                <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Votre nom *</label>
                <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control font" name="nom" id="nom" placeholder="Loper" autofocus>
                    <span id="errorNom"></span>
                </div>
                <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Votre prénom *</label>
                <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control font" name="prenom" id="prenom" placeholder="Dave">
                    <span id="errorPrenom"></span>
                </div>
            </div>
            <!-- gender and date of birth are in the same row -->
            <div class="form-group row">
                <!-- gender -->
                <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Sexe *</label>
                <div class="col-lg-4 col-md-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexe" id="madame" value="madame">
                        <label class="form-check-label font"  id="madame"
                            for="inlineCheckbox1">Madame</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexe" id="monsieur" value="monsieur">
                        <label class="form-check-label font"  id="monsieur"
                            for="inlineCheckbox2">Monsieur</label>
                    </div>
                    <span id="errorSexe"></span>
                </div>
                <!-- And date of birth -->
                <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Date de naissance *</label>
                <div class="col-lg-4 col-md-4">
                    <input type="date" class="form-control font" name="date" id="date">
                </div>
            </div>
            <!-- Adress and zip are in the same row -->
            <div class="form-group row">
                <!-- Adress  -->
                <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Adresse </label>
                <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control font" name="adresse" id="adresse"
                        placeholder="30 Rue de Poulainville">
                    <span id="errorAdresse"></span>
                </div>
                <!-- and Zip -->
                <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">code postal </label>
                <div class="col-lg-2 col-md-4">
                    <input type="text" class="form-control font" name="cp" id="cp" placeholder="80000">
                    <span id="errorCp"></span>
                </div>
            </div>
            <!-- City and E-mail are in the same row-->
            <div class="form-group row">
                <!-- City -->
                <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Ville</label>
                <div class="col-lg-4 col-md-4">
                    <input type="text" class="form-control font" name="ville" id="ville" placeholder="Amiens">
                    <span id="errorVille"></span>
                </div>
                <!-- E-mail -->
                <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">E-mail *</label>
                <div class="col-lg-4 col-md-4">
                    <input type="email" class="form-control font" name="email" id="email"
                        placeholder="dave.loper@afpa.fr">
                    <span id="errorEmail"></span>
                </div>
            </div>
        </fieldset>
        <!-- "Your request" fieldset -->
        <Fieldset>
            <legend>Votre demande :</legend>
            <!-- Subject of the contact and the message are in the same row-->
            <div class="form-group row">
                <!-- Subject of the contact -->
                <div class="form-group col-lg-4 col-md-5">
                    <label for="FormGroupLabel">Sujet *</label>
                    <select class="custom-select" name="select" id="select">
                        <option selected>Selectionnez votre sujet</option>
                        <option value="mes_commande">Mes commandes</option>
                        <option value="question_produit">Question(s) sur un produit</option>
                        <option value="reclamation">Réclamation</option>
                        <option value="autres">Autres</option>
                    </select>
                    <span id="errorSelect"></span>
                </div>
                <!-- Message -->
                <div class="form-group col-lg-8 col-md-7">
                    <label for="FormGroupLabel">Votre message *</label>
                    <textarea class="form-control font" name="message" id="message" rows="4"></textarea>
                    <span id="errorMessage"></span>
                </div>
            </div>
        </Fieldset>
        <!-- Check box for using data  -->
        <div class="form-check form-check-inline mb-3 font">
            <input class="form-check-input font" type="radio" name="accepte" id="accepte">
            <label class="form-check-label" for="inlineCheckbox2">J'accepte le traitement informatique de ce
                formulaire *</label>

        </div> <br>
        <span id="errorAccepte"></span>
        <!-- buttons to send or reset the input -->
        <div class="form-group text-center">
            <span id="erreur"></span><br>
            <button type="submit" class="btn btn-primary mb-2" name="submit" id="submit" value="envoiContact">Envoyer</button>
            <button type="reset" class="btn btn-outline-secondary mb-2 ml-2" value="resetContact">Annuler</button>
        </div>
    </form>

<?php
    include("footer.php");    
?>