<?php 
require_once "./fonctions.php";
if(isset($_POST['enreg'])){
    $lien=$_POST['lien'];
    addLinkToDb($lien);

}
//ici je recupere les liens deja transformer
$bdd=dbConnexion();//on se connecte a la Base de donnee 
    $req=$bdd->query('SELECT * FROM liens');
?>

<html>
    <head>
        <title>Test</title>
    </head>
    <body>
        <form action="index.php" method="POST">
            <label for="lien"> Entrez l'URL a reduire </label>
            <input type="text" id="lien"  name="lien" required>
            <input type="submit" value="generer" name="enreg">
        </form>
        <p>Liste des URL deja reduit </p>
        <li>
            <?php 
    while($elt=$req->fetch()){
            ?>
            <ul>
                <a href="<?php echo $elt['lienLongs'];?>" target="_blank">
                <?php echo $elt['lienCourts'].$elt['id'];?>
            </a>
            </ul>
            <?php  }?>
        </li>
    </body>
</html>