<?php
//fonction de connexion a la base de donnee avec l'objet pdo 
function dbConnexion() { 
    $bdd;
        try
        {
        $bdd = new PDO('mysql:host=localhost;dbname=urlRewriting;utf-8', 'root', '');
        }
        catch(Exception $e)
        {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
        }
        return $bdd ;
}
 // fonction de deconnection a la base de donnee 
 function dbLogout($bdd){
    $bdd = null;
}

function addLinkToDb($lien){
    $lienTransform= lienTransform($lien);
    $bdd=dbConnexion();//connexion
     $req=$bdd->prepare('INSERT INTO liens(lienCourts,lienLongs) VALUES(?,?)') ;
     $req->execute(array($lienTransform,$lien));//executer la requette
     dbLogout($bdd);//se deconnecter
     return true;
}
function lienTransform($lien){
    $leLien= explode('/', $lien);
    return $leLien[0].$leLien[1]."//".$leLien[2]."/link";
}

?>