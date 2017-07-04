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

if (!empty($nom) && !empty($prenom) &&!empty($telephone) ) {
	
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
}
// die( $query );
// print_r( $dbh->errorInfo() );
// if ($dbh->query($sql) === TRUE) {
//     echo "New created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
// echo "<p> Nom : ".$nom . "</p>";
// echo "<p> Prénom : ".$prenom . "</p>";
// echo "<p> Entreprise : ".$entreprise . "</p>";
// echo "<p> Date de naissance : ".$date . "</p>";
// echo "<p> Adresse : ".$adresse . "</p>";
// echo "<p> Téléphone : ".$telephone . "</p>";
// echo "<p> Groupes : ".$groupes . "</p>";
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Annuaire</title>
</head>
<body>

<a href="form.html">Formulaire</a>

<h1>Annuaire</h1>
<table border="solid">
	<thead>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Entreprise</th>
		<th>Date de naissance</th>
		<th>Adresse</th>
		<th>Téléphone</th>
		<th>Supprimer</th>
	</thead>
	<tbody>
		<?php
		$reponse = $dbh->query('SELECT * FROM Annuaire');
		while ($affiche=$reponse ->fetch()) {
			echo'<tr><td>'.$affiche['Nom'].'</td><td>'.' '.$affiche['Prénom'].'</td><td>'.' '.$affiche['Entreprise'].'</td><td>'.' '.$affiche['Date de naissance'].'</td><td>'.' '.$affiche['Adresse'].'</td><td>'.' '.$affiche['Téléphone'].'</td><td><a href="/AnnuairePHP/supp.php?SUPP='.$affiche['id'].'">Supprimer</a></td></tr>';
		}
		?>
	</tbody>
	
</table>


</body>
</html>