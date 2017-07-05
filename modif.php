<?php  
/* Connexion à une base */
$dsn = 'mysql:host=localhost;dbname=annuaire;charset=utf8';
$user = 'annuaire';
$password = 'WwstVcyWnuEYmR0a';
try {
    $dbh = new PDO($dsn, $user, $password);
}
// en cas d'erreur on affiche un message :
 catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}


print_r( $_POST );


$id = $_POST["id"];
$nom = $_POST["Nom"];
$prenom = $_POST["Prénom"];
$entreprise = $_POST["Entreprise"];
$date = $_POST["Date_de_naissance"];
$adresse = $_POST["Adresse"];
$telephone = $_POST["Téléphone"];




if (isset($_POST["modifier"])) {

  $req="UPDATE Annuaire SET nom = '"
  . $nom 
  . "', Prénom = '"
  . $prenom 
  . "', Entreprise = '"
  . $entreprise
  . "', `Date de naissance` = '"
  . $date 
  . "', Adresse = '"
  . $adresse
  . "', Téléphone = '"
  . $telephone
  . "' WHERE id = "
  . $id
  .';';


//die( $req );

  if ($dbh->exec($req)){
    echo "ok";
  }else{
    echo "nop";

 }
 print_r($req->errorinfo());

}



?>