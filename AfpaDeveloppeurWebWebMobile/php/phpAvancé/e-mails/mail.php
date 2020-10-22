<?php
$to = "Roy Framery <roy.afpa@gmail.com>";
// Or just roy.framery@gmail.com
// To do that you can use $_SESSION or $_POST/$_GET to get informations 

$subject = "Bienvenue chez Jarditou !";

$message = "
<!DOCTYPE html>
<html lang='fr'>
    <head>
        <meta charset='utf-8'>
        <title>Mon premier mail HTML</title>   
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
            
        <style>
            html 
            {
                font-size: 100%;
            }

            body 
            {
                font-size: 1rem; /* Si html fixé à 100%, 1rem = 16px = taille par défaut de police de Firefox ou Chrome */
            }
        </style>  
    </head>

    <body>
        <div class='container'>
            <div class='row'>
                <div class='col-12 text-center'>
                    <h1>Toute notre équipe vous souhaite la bienvenue chez Jarditou !</h1>
                </div>    
            </div>   
            <div class='row'>
                <div class='col-12 text-center'>
                    Profitez dès à présent des nombreuses offres présent sur le site !.
                </div>    
            </div>   
            
            <div class='row'>
                <div class='col-12 d-flex justify-content-center'>
                    <img src='https://dev.amorce.org/fdumoulin2/jarditou/assets/img/jarditou_logo.jpg' title='Logo' alt='Logo' class='img-fluid'>
                </div>    
            </div>   
        </div> 
            
        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
    </body>
</html>
";

$aheaders = array('MIMe-version' => '1.0',
                'Content-type' => 'text/html; charset utf-8',
                'From' => 'Roy Framery <roy.framery@gmail.com>',
                'Reply-To' => 'Service commercial <18.o.25.nomekop@gmail.com',
                'X-Mailer' => 'PHP/'. phpversion()
                );

/* 
Format texte    "Content-Type: text/plain; charset=utf-8";
BCC             Blind Carbon Copy, ou copie carbone cachée : adresses mail des personnes recevant une copie du message; ces adresses sont masquéees par le destinataire. Attention, les logiciels antispam n'aiment pas.
CC           	Carbon Copy, ou copie carbone : adresses mail des personnes recevant une copie du message; ces adresses sont visibles par le destinataire. Attention, les logiciels antispam n'aiment pas.
Content-Type 	Type de contenu du mail, c'est-à-dire le format.
From 	        Expéditeur du mail.
MIME-Version 	Version du type MIME, toujours la valeur 1.0.
Reply-To 	    Adresse mail de réponse au mail. Si non indiquée, cette adresse sera celle de l'expéditeur spécifiée dans From.
X-Mailer     	Indique le logiciel, service ou langage (par exmple la version de PHP) utilisé pour envoyer le mail.
*/

// $parameters = "";

mail($to, $subject, $message, $aheaders);

?>