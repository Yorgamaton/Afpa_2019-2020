<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">    
    <title>UML</title>
    
</head>
<body>
    <div class="container">
        <h1>Concevoir la solution à partir des diagrammes UML:</h1>

        <div id="accordion">

            <!-- Card for explanation about use case diagram -->
            <div class="card">
                <div class="card-header d-flex justify-content-between" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Les diagrammes de cas d'utilisation :
                        </button>
                    </h2>
                    <img src="https://i.giphy.com/media/uvKoY05BwNz9K/giphy.webp" style="width: 15%;" alt="">
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                    
                        <ul>
                            <li>Permettent de visualiser l'interaction du système avec le monde extérieur</li>
                            <li>Permettent de modéliser très tôt les processus métiers et l'organisation de l'entreprise.</li>
                        </ul>

                        <h2>A partir du cachier des charges il faut :</h2>
                            <ul>
                            <li>Identifier les acteurs de notre système et uniquement eux</li>
                            <li>Identifier les évènements qui demandent une action de notre système</li>
                            <li>Identifier les cas d’utilisations</li>
                            </ul>

                        <h3>Les composantes d'un diagramme de cas :</h3>

                        <ul>

                            <li>
                                <h4>Les acteurs :</h4> 
                                <p>représente une entité qui intéragit avec le système et est représenté par un "stick man".</p>
                                <p>4 types d'acteurs : </p>
                                <ul>
                                    <li>Acteurs principaux : personnes qui utilisent les fonctions du système.</li>
                                    <li>Acteurs secondaires : personnes qui effectuent des tâches administratives ou du maintenance.</li>
                                    <li>Matériels extérieurs : par exemple un distributeur de billet.</li>
                                    <li>Les autres systèmes : par exemple le réseau de cartes bancaires.</li>
                                </ul>
                                <label for="">Ensemble des questions à se poser pour trouver les acteurs :</label>
                                <select name="" id="">
                                    <option value="">Qui est intéressé par le besoin?</option>
                                    <option value="">Dans l’entreprise, où le système se trouve-t-il utilisé?</option>
                                    <option value="">Qui entre l’information, qui l’utilise, qui la détruit?</option>
                                    <option value="">Qui fait le support et la maintenance du système étudié?</option>
                                    <option value="">Le système utilise-t-il une ressource extérieure?</option>
                                    <option value="">Quels acteurs ont besoin de la fonction?</option>
                                    <option value="">Un acteur joue-t-il plusieurs rôles?</option>
                                    <option value="">Le même rôle est-il joué par plusieurs acteurs?</option>
                                    <option value="">Tout autre question qui paraît pertinente!</option>
                                </select>
                                <p>Un acteur doit être identifié par son rôle, il peut jouer plusieurs rôles et dont être plusieurs acteurs.</p>
                                <div class="alert alert-warning" role="alert">
                                    <i class="fas fa-exclamation-triangle"></i> Identifier les référentiels de données comme acteurs peut amener des biais qui consiste, lors de la rédaction des cas d'utilisation, à rentrer dans la solution et oublier l'expression première du besoin.
                                </div>
                            </li>

                            <li>
                                <h4>Le cas d'utilisation (ou use case) :</h4>
                                <p>Les use case sont des séquences d'actions menées par le système.</p>
                                <p>Il peut être déclenché par un ou plusieurs éléments extérieurs.</p>
                                <p>Le résultat doit être observable par l'utilisateur.</p>
                                <p>une ellipse représent le cas d'utilisation </p>
                                <label for="">Ensemble des questions à se poser pour trouver les use cases :</label>
                                <select name="" id="">
                                    <option value="">Mais que va faire cet acteur avec le système en arrivant le matin au boulot ?</option>
                                    <option value="">Pourquoi démarre t-il le système, avec quel objectif métier ? </option>
                                    <option value="">Quelles sont les tâches de l’acteur?</option>
                                    <option value="">Quel acteur crée, sauvegarde, modifie, efface ou simplement consulte cette information?</option>
                                    <option value="">Quel use case crée, efface, modifie ou consulte cette information?</option>
                                    <option value="">L’acteur devra-t-il informer le système des changements venant de l’extérieur?</option>
                                    <option value="">L’acteur doit-il être informé sur certains états du système?</option>
                                    <option value="">Tout les besoins fonctionnels sont-ils pris en compte?</option>
                                    <option value="">Tout autre question qui paraît pertinente!</option>
                                </select>
                                
                                <ul>
                                    <h6>Un cas d'utilisation se compose de :</h6>
                                    <li>Un nom : utiliser un verbe à l'infinitif (Ex: Réceptionner un colis)</li>
                                    <li>Une description : résumée permettant de comprendre l'intention principale du cas d'utilisation. </li>
                                    <li>Des acteurs déclencheurs : ceux qui vont réaliser le cad d'utilisation.</li>
                                    <li>Des acteurs decondaires: ceux qui ne font que recevoir les informations à l'issue de la réalisation du cas d'utilisation. </li>
                                    <li>Pré-conditions: décrivent dans quel état doit être le système (l'application) avant que ce cas d'utilsiation puisse être déclenché (Ex: un contrat existe avec le client).</li>
                                    <li>Des scénarii: dont décrits sous la forme d'échanges d'éènements entre l'acteur et le système (3 types: scénario nominal, alternatif et d'exception).</li>
                                    <li>Des post-conditions: décrivent l'état du système à l'issue des différens scénarii (EX: un contrat est créé et le système back-office est mis à jour avec le nouveau contrat créé).</li>
                                    <li>Des informations: sur l'utilisation du cas d'utilisation (Ex: le nombre de personnes exécutant ce cas d'utilisation dans un journée type).</li>
                                    <li>Optionnel: Les besoins en termes d'interface graphique.</li>
                                    
                                    <!-- modal -->
                                    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target=".modal1">Voir un exemple de rédaction</button>

                                    <div class="modal fade modal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Exemple de description détaillée d’un cas d'utilisation pour le cas "retirer de l'argnt au distributeur'</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <ul>Partie 1 :
                                                            <li>Précondition:Le distributeur contient des billets, il est en attente d’une opération, il n’est ni en panne, ni en maintenance</li>
                                                            <li>Début: lorsqu’un client introduit sa carte bancaire dans le distributeur</li>
                                                            <li>Fin: lorsque la carte bancaire et les billets sont sortis</li>
                                                            <li>Postcondition: Si de l’argent a pu être retiré la somme d’argent sur le compte est égale à la somme d’argent qu’il y avait avant, moins le montant du retrait. Sinon la somme d ’argent sur le compte est la même qu’avant.</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-4">
                                                            <ul> Partie 2: 
                                                                <h6>Déroulement normal:</h6>
                                                                <ul>
                                                                    <li>(1) le clientintroduit sa carte bancaire</li>
                                                                    <li>(2) le systèmelit la carte et vérifie si la carte est valide</li>
                                                                    <li>(3) le systèmedemande au client de taper son code</li>
                                                                    <li>(4) le clienttape son code confidentiel</li>
                                                                    <li>(5) le systèmevérifie que le code correspond à la carte</li>
                                                                    <li>(6) le clientchoisi une opération de retrait</li>
                                                                    <li>(7) le systèmedemande le montant à retirer</li>
                                                                    <li>...</li>
                                                                </ul>
                                                                <h6>Variantes :</h6>
                                                                <ul>
                                                                    <li>(A) Carte invalide: au cours de l’étape (2) si la carte est jugée invalide, le système affiche un message d’erreur, rejète la carte et le cas d’utilisation se termine.</li>
                                                                    <li>(B) Code erroné: au cours de l ’étape (5) ...</li>
                                                                </ul>
                                                            </ul>
                                                        </div>
                                                        <div class="col-4">
                                                            <ul>Partie 3 : 
                                                            <h6>Contraites non fonctionnelles :</h6>
                                                                <li>(A) Performance: le système doit réagir dans un délai inférieur à 4 secondes, quelque soit l’action de l’utilisateur.</li>
                                                                <li>(B) Résistance aux pannes: si une coupure de courant ou une autre défaillance survient au cours du cas d’utilisation, la transaction sera annulée, l’argent ne sera pas distribué. Le système doit pouvoir  redémarrer automatiquementdans un état cohérent et sans intervention humaine</li>
                                                                <li>(C) Résistance à la charge : le système doit pouvoir gérer plus de 1000 retraits d’argent par jour</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target=".modal2">Second exemple</button>

                                    <div class="modal fade modal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Exemple de description détaillée d’un cas d'utilisation pour le cas "Jouer à un jeu en ligne"</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <p>Pour voir la vidéo de la construction de l'UML <a href="https://www.youtube.com/watch?v=dJd6azZr9Kg">cliquez ici !</a></p>
                                                <img src="images/uml_tableau_cas_utilisation.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>


                                </ul>
                            </li>


                            <div class="alert alert-warning" role="alert">
                                <i class="fas fa-exclamation-triangle"></i> Le use case permet de décrire les fonctionnalités attendues du système du point de vue des acteurs. Mais attention à ne pas aller vers les "fonctions", c'est à dire de réaliser un découpage fonctionnel au sens procédures des langages procéduraux. 
                            </div>
                            <li>
                                <h4>Les relations entre use case :</h4>
                                <ul>
                                    <li>La relation de communiaction : représenté par une flêche entre l'initiateur de l'interaction et celui qui reçoit. On peut indiquer la communication au dessus de la flêche.</li>
                                    <li>La relation d'utilisation : représenté par une flêche entre deux actions ("include/utilise")</li>
                                    <li>La relation d'extension : il y a une notion d'héritage où la relation s'étend sur une autre action ("extend/étend"). Autrement dit, on se sert de quelque chose existant pour compléter une action.</li>
                                </ul>
                            </li>

                            <li>
                                <h4>Documentation :</h4>
                                <ul>
                                    <li>Pour chaque acteur, faire une description rapide en quelques lignes.</li>
                                    <li> Pour chaque cas d'utilisation, faire une description rapide ainsi que le détail des évènements (avec les informations) :                        
                                        <ul>
                                            <li>Comment et quand commence et se termine le cas d'utilisation?</li>
                                            <li>Quand y a-til interaction entre cas d'utilisation et acteur ?</li>
                                            <li>Quelles informations constituent un échange entre l'acteur et le cas d'utilisation ?</li>
                                            <li>Le flux nominal (cf. Exemple de rédaction 3) flot nominal)</li>
                                            <li>Les n flots alternatifs (cf. Exemple de rédaction 4) flot alternatif)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li>
                            <h4>Les scénarii :</h4>
                                <p>Un scénario est une instance de cas d'utilisation qui correspond à un chemin que peut suivre le système.</p>
                                <p> A noter qu'on a un scénario à chaque point de décision et chaque exception.</p>
                            <h5>Exemple de rédaction :</h5>
                                <textarea name="" id="" cols="100" rows="10">
                                    1)Description :
                                    Ce cas d’utilisation permet de saisir les informations concernant la commande d’un véhicule par un client.
                                    
                                    2) Flux d’évènements (Workflow):
                                    
                                    a. Conditions
                                    Seul un commercial ou le concessionnaire peut opérer cette saisie.
                                    Le client doit déjà être répertorié.
                                    Ce cas d’utilisation n’est disponible que pendant la journée aux heures d’ouverture de l’établissement.
                                    
                                    b. Résultats
                                    Une commande client est enregistrée.
                                    Les informations concernant le client sont mises à jour.
                                    Le règlement est enregistré et la facture éditée.
                                    
                                    3)Flot Nominal
                                    Le commercial recherche les coordonnées du client.
                                    Le système lui affiche les informations connues sur le client.
                                    Le commercial saisit la référence du véhicule commandé.
                                    Le système contrôle l’existence de la référence.
                                    Puis il contrôle la quantité en stock.
                                    
                                    S’il y a au moins un véhicule en stock, le système : 
                                    •affiche les informations complémentaires sur le véhicule
                                    •demande les informations concernant le règlement.
                                    •la confirmation de la commande
                                    
                                    Si la commande est confirmée :
                                    •la commande est enregistrée
                                    •le règlement est enregistré, la facture est enregistrée et éditée
                                    •le véhicule est sorti du stock.
                                    
                                    Le cas d’utilisation prend fin

                                    4)Flots alternatifs

                                    a. Le client n’est pas répertorié
                                    •Le commercial suspend sa saisie de commande pour aller enregistrer le client.
                                    •Une fois chaque action menée, l’enregistrement de la commande peut reprendre.
                                    
                                    b. Les coordonnées du client sont erronées
                                    Le système a détecté qu’une ou plusieurs informations saisies concernant le client sont absentes ou comportent des erreurs :
                                    •Le système signale les informations en erreur.
                                    •Le commercial corrige les erreurs.
                                    •Ceci se répète jusqu’à ce que le système ne détecte plus d’erreur.
                                    
                                    c. La référence du véhicule saisie est incorrecte
                                    •Le système affiche une liste de références existantes.
                                    •Le commercial sélectionne la référence voulue.
                                    •Le scénario normal reprend.
                                    
                                    d. Il n’y a pas la référence en stock
                                    •Le système recherche le délai de livraison.
                                    •Si le délai est accepté par le client, le scénario normal reprend.
                                    •Sinon, il y a abandon de la procédure en cours

                                    e. Le règlement ne peut pas être enregistré
                                    •Le cas d’utilisation prend fin.
                                    
                                    f. La prise de commande n’est pas confirmée
                                    •Le système annule le règlement s’il a été enregistré
                                    •Le cas d’utilisation prend fin.
                                    
                                    g. Abandon a tout moment du processus
                                    •Le cas d’utilisation prend fin.
                                </textarea>
                            </li>
                            
                            <li>
                            <h4>Les intérêts :</h4>
                                <ul>
                                    <li>Permet de vérifier que le développeur à bien compris le besoin</li>
                                    <li>permet de communiquer avec le client/utilisateur et l'expert du domaine, pour s'assurer de la compréhension</li>
                                    <li>Permet de comprendre qui intervient sur le système, ce qu'il doit faire, qui intéragit dessus et quelles interfaces il doit posséder.</li>
                                </ul>
                            </li>

                            <li>
                                <h4>infos compplémentaires :</h4>
                                <ul>
                                    <li>Les « Use case Realization » :
                                        <p>Ce sont un moyen de regrouper un diagramme de classes et des diagrammes de séquences ou de collaboration. On retrouvera dans 
                                        le diagramme de classes les classes qui mettent en oeuvre le cas d'utilisation associé au « use case realization » 
                                        (structure des classes et relations entre classes). On retrouvera dans les différents diagrammes de séquences (ou de collaboration)
                                        une documentation des différents évènements échangés entre les objets afin de réaliser les différents scénarii décrit dans le cas 
                                        d'utilisation. Image non disponible</p>
                                        <p>Au final, dans le modèle d'analyse et dans le modèle de conception, on aura un « use case realization » par cas d'utilisation et 
                                        dans chaque « use case realization » on aura autant de diagrammes de séquence (ou de collaboration) que de scénarii décrits dans le cas 
                                        d'utilisation (scénario nominal, scénarios alternatifs et scénarios d'exception). Plusieurs scénarii pourront cependant être regroupés 
                                        dans un seul diagramme de séquence. </p>
                                    </li>
                                </ul>
                            </li>
                            <div class="alert alert-warning" role="alert">
                                <i class="fas fa-exclamation-triangle"></i> Pour en savoir plus sur la construction d'un cas d'utilisation, prendre connaissance du pdf suivant : <a href="pdf/CasUtilisation.pdf" target="_blank">CasUtilisation.pdf</a> 
                            </div>
                        </ul>

                    </div>
                </div>
            </div>

            <!-- card for explanation about activity case diagram -->
            <div class="card">
                <div class="card-header d-flex justify-content-between" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Les diagrammes de cas d'activités :
                        </button>
                    </h5>
                    <img src="https://i.giphy.com/media/jSXkVsYaQxw6k/giphy.webp" style="width: 15%;" alt="">
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <ul>
                            <li>Permettent de modéliser un workflow (flux d'évènements) dans un use case ou entre pluseiurs use cases.</li>
                            <li>permettent de spécifier une opération (décrire la logique d'une opération)</li>
                            <li>Permettent de modéliser la dynamique d'un processus, d'un use case ou d'une tâche.</li>
                        </ul>
                        
                        <h3>Les éléments du diagramme d'activité</h3>
                        <p>Un diagramme d'activité se compose :</p>
                        <ul>
                            <li>D'un ou plusieurs points de départ (formaliser par un rond plein)</li>
                            <li>D'actions (formalisé par un rectangle avec l'action à l'intérieur)</li>
                            <li>D'un point de terminaison (formaliser par un rond plein entouré d'un cercle)</li>
                        </ul>

                        <h3>Concernant les actions :</h3>
                        <p>Elles sont liées par :</p>
                        <ul>
                            <li>une transition séquentielle : la transition démarre quand l'action précédente se termine</li>
                            <li>Des transitions alternatives (avec condition) : elles mènent vers des actions différentes (formaliré par un losange)</li>
                            <li>Transitions de synchronisation (formalisé par une bande noire)
                                <ul>
                                    <li>disjonction : deux activités peuvent démarrer à la fin d'une activité commune</li>
                                    <li>conjonctions d'activités : pour démarer une activité il faut attendre la terminaison de deux (ou plus) autres activités</li>
                                </ul>
                            </li>
                        </ul>

                        <h3>Exemple de cas d'activité :</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal3">Gestion de client</button>

                        <div class="modal fade modal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <img src="images/cas d'activité.png" alt="">
                            </div>
                        </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal4">Exécution d'une commande</button>

                        <div class="modal fade modal4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <img src="images/uml_partitions.png" alt="">
                            </div>
                        </div>
                        </div>

                        <p>Cours du <a href="pdf/CasActivité.pdf" target="_blank">CasActivité.pdf</a></p>
                    </div>
                </div>
            </div>

            <!-- <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>