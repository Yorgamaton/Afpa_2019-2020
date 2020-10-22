/*EXERCICE 1 : Total d'un commande

Enoncé:
A partir de la saisie du prix unitaire noté PU d'un produit et de la quantité commandée QTECOM, 
afficher le prix à payer PAP, en détaillant le port PORT et la remise REM, sachant que :

=>le port est gratuit si le prix des produits TOT est supérieur à 500 €. Dans le cas contraire, le port est de 2% de TOT
=>la valeur minimale du port à payer est de 6 €
=>la remise est de 5% si TOT est compris entre 100 et 200 € et de 10% au-delà

Testez tous les cas possibles afin de vous assurez que votre script fonctionne. 
*/
// TODO: voir pour les arrondis à 2 chiffres après la virgule (var.tofixed(2)???)

var pu = parseInt(prompt("Saisissez le prix unitaire :"));
var qtecom = parseInt(prompt("Saisissez la quantité que vous désirez :"));
var tot = pu * qtecom; // Total before to add shipping and discount
var port = 6; // minimum of shipping is 6€ (6€ correspond to 2% of 300€)
var rem;
var pap;
console.log("Quantité : "+qtecom+"\nPrix unitaire : "+pu +" €\nTotal : "+tot+ " €")
function tot_commande() {
    if (tot < 100) {
        console.log("Port : " + port + " € \nTotal : " + (tot+port) + " €");
    } else if ((tot >= 100) && (tot < 200)) {
        rem = tot * (1 - 5 / 100); // We start to apply the discount (1-5/100)= 5% discount
        pap = rem + port;
        console.log("Remise : " + (tot-rem) + " € \nPort : " + port + " €\nTotal : " + pap + " €");
    } else { //if (tot>=200)
        if (tot <= 300) { // 6€ of shipping correspond to 2% of 300€ 
            rem = tot * (1 - 10 / 100); // (1-10/100)= 10% discount
            pap = rem + port;
            console.log("Remise : " + (tot-rem) + " €\nPort : " + port + " €\nTotal : " + pap + " €");
        } else if ((tot > 300) && (tot < 500)) {
            rem = tot * (1 - 10 / 100);
            port = tot * (2 / 100);
            pap = (tot*1.1)+(tot*0.2);
            console.log("Remise : " + (tot-rem) + " €\nPort : " + port + " €\nTotal : " + pap + " €");
        } else { //if (tot>=500) here shipping is free
            rem = tot * (1 - 10 / 100);
            pap = rem;
            console.log("Remise : " + (tot-rem) + " €\nPort :  offert !\nTotal : " + pap + " €");
        }
    }
}
tot_commande();