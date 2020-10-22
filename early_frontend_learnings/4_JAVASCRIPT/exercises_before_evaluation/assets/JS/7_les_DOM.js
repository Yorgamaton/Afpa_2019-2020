function testerRadio() {
    var radio = docu - ment.getElementsByName("btnRadChoix");
    for (var i = 0; i < radio.length; i++) {
        if (radio[i].checked) {
            document.getElementById("txtBox1").value = radio[i].value;
        }
    }
}



var version = navigator.appVersion;
console.log("Le code name de votre browser est :" + navigator.appCodeName);
console.log("Le nom ou la marque du browser est :" + navigator.appName);
console.log("Les informations sur la version sont :" + version);
console.log("Le browser a comme user-agent :" + navigator.userAgent);
console.log("");

if (version.indexOf('Win') > -1) {
    console.log("<br />Vous etes sous l'environne-ment Windows");
    console.log("<br />");
}
if (navigator.userAgent.indexOf('Firefox') > -1) {
    console.log("Vous utilisez un navigateur Fire-Fox");
} else if (version.indexOf('Chrome') > -1) {
    console.log("Vous utilisez un navigateur Chrome");
} else if (version.indexOf('MSIE') > -1) {
    console.log("Vous utilisez un navigateur Mi-crosoft Internet Explorer");
} else {
    console.log("Vous utilisez un navigateur in-connu");
}