<?php
include'index.php';
$dsn = 'mysql:dbname=Maurice;host=127.0.0.1';
$user = 'ACG';
$password = '1304MO1989DI';

try {
    $bdd = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}


if (isset($_POST['forminscription'])) 
{
    if(!empty($_POST['pseudo']) AND !empty($_POST['Password']) AND !empty($_POST['Password2'])) 
	{
	  $pseudo = htmlspecialchars($_POST['pseudo']);
	  
	  $Password = sha1($_POST['Password']);
	  $Password2 = sha1($_POST['Password2']);

	  $pseudolength = strlen($pseudo);
	  if ($pseudolength <= 255) 
  	  {
		    if ($Password == $Password2)
		     {
		        
		      $insertmbr = $bdd->prepare("INSERT INTO moris(id,Pseudo, Password) VALUES('',$pseudo', '$Password')");
		      $insertmbr->execute(array($pseudo, $Password));
		      $erreur = "votre compte a bien été crée";


     		}	
		     else
			    {

			      $erreur ="vos mots de passe ne correspondent pas";
			    }
	  }
	  else
		 {

		    $erreur = "votre pseudo ne doit pas dépasser 255 caractéres";
		  }
  }
else
  {

    $erreur = "tous les champs doivent etre complétés";
  }
}



?>


 	
<!DOCTYPE html>


<html>
<head>
	<title></title>
</head>
<body>
		
	<h3>Inscription</h3>
	<form class="register" method="POST" action="inscription.php">


	<input type="text" name="pseudo "/>Pseudo<br><br>
	
	<input type="Password" name="Password"/>Password<br><br>
	
	<input type="password" name="Password2"/>Repeat Password<br><br>

	<input type="submit" value="register" name="forminscription">
		
	

	</form>

<?php

      if (isset($erreur))
       {
        echo '<font color="red">' .$erreur."</font>";
      }

      ?>








</body>
</html>