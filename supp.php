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


 if(isset($_GET['SUPP'])){
	
     $req = $dbh->exec('
     	DELETE FROM Annuaire WHERE id = '.$_GET['SUPP'].'
    	
     	');
    
    $req = $dbh->exec('
     	DELETE FROM Groupes WHERE id = '.$_GET['SUPP'].'
    	
     	'); 

 }

header('Location: /AnnuairePHP/form.html');



?>