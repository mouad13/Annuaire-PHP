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



$nom = $_POST["Nom"];
$prenom = $_POST["Prénom"];
$entreprise = $_POST["Entreprise"];
$date = $_POST["Date_de_naissance"];
$adresse = $_POST["Adresse"];
$telephone = $_POST["Téléphone"];
$groupes = $_POST["Groupes"];


$query = "
	INSERT INTO Annuaire
	(Nom, Prénom, Entreprise, `Date de naissance`, Adresse, Téléphone)
	VALUES
	('$nom', '$prenom', '$entreprise', '$date', '$adresse', '$telephone');
";

$grps = "
	INSERT INTO Groupes
	(Groupes)	
	VALUES
	('$groupes');

";

$dbh ->exec( $query );
$dbh ->exec($grps);


//die( $query );
// print_r( $dbh->errorInfo() );

// if ($dbh->query($sql) === TRUE) {
//     echo "New created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }








echo "<p> Nom : ".$nom . "</p>";
echo "<p> Prénom : ".$prenom . "</p>";
echo "<p> Entreprise : ".$entreprise . "</p>";
echo "<p> Date de naissance : ".$date . "</p>";
echo "<p> Adresse : ".$adresse . "</p>";
echo "<p> Téléphone : ".$telephone . "</p>";
echo "<p> Groupes : ".$groupes . "</p>";




?>