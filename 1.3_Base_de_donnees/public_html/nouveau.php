<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="css/cooperative.css">
    <script src="javascript/morpion.js"  type="text/javascript"></script>
  </head>
  <body>
      <header>
		  <p class="flotte">
          <img src="images/cooperative.jpg" width="450" alt="cooperative" />
		  </p>
          <h1>La Coopérative</h1>
		  <h2>Activité 1.3 Implémenter une base de données</h2>
		  
      </header>
      <main>
        <div class='shadowbox'>
			<h3 onmouseover="couleurtitre()">Bienvenue</h3>
			Nous sommes le <?php echo date("d:m:y")?> et il est <?php echo date("H:i:s");?>
			<br/>
			votre adresse IP est  <?php echo $_SERVER['REMOTE_ADDR'];?><br/>
			Ce script est exécuté sur le serveur <?php echo $_SERVER['SERVER_SOFTWARE'];?> qui se 
			trouve à l'adresse <?php echo $_SERVER['SERVER_ADDR']?>.<br/>
			Vous appartenez au groupe <?php echo $_GET['groupe']; ?> <br>
		</div>
		<br/>
		<div class='shadowbox' align='center'>
			<?php
				$servername = 'localhost';
				$username = $_GET['groupe'].'admin';
				$password = 12345 ;
				$database = $_GET['groupe'];
            
            //On établit la connexion
            $conn = mysqli_connect($servername, $username, $password, $database);
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            echo 'Connexion à la base réussie';
        ?>
		</div>
		<div class='shadowbox' align='center'>
			Bonjour <?php echo $_GET['prenom']; ?> <?php echo $_GET['nom']; ?>, vous êtes désormais inscrit sur notre site sous l'identifiant
			<?php echo $_GET['login']; ?> et vous habitez à <? echo $_GET['adresse']; ?><br/>
			Vous pouvez maintenant passer une commande en vous connectant sur notre site, grâce à la boite de connexion dans le menu de gauche.
		

        <?php
		$login = $_GET['login'];
		$nom  = $_GET['nom'];
		$prenom = $_GET['prenom'];
		$mdp = $_GET['password'];
		$adresse = $_GET['adresse'];
		
		$sql = "INSERT INTO buveurs (email, nom_buveur, prenom_buveur, mot_de_passe,adresse)
		VALUES ('$login', '$nom', '$prenom', '$mdp', '$adresse');";

		if ($conn->query($sql) === TRUE) {
					echo "<br/>Nouvel enregistement réalisé";
					} else {
					echo "Erreur: " . $sql . "<br>" . $conn->error;
					}

		$conn->close();
		?>
      </main>
      <aside>
        <div>
          <h3>Commander</h3>
          Cette page vous permettra de commander les vins de notre production à partir de notre strock.
        </div>
        <div>
          <h3>Identifiez-vous !</h3>
          <h4>Je suis déjà inscrit</h4>
 			<form id='form1' action='commande.php' method='get'>
			<table align='center'>
				<tr>
					<td><p>Login : </p></td><td><p><input type='text' name='login'/></p></td>
				</tr>
				<tr>
					<td><p>Mot de passe :</p></td><td><p> <input type='password' name='password'/></p></td>
				</tr>
			</table>
			  <p align='center' >Groupe de travail : <br/>
                    <select name='groupe'>
						<option value='groupetest'>groupe test</option>
                        <option value='groupe1'>groupe 1</option>
                        <option value='groupe2'>groupe 2</option>
                        <option value='groupe3'>groupe 3</option>
						<option value='groupe4'>groupe 4</option>
						<option value='groupe5'>groupe 5</option>
						<option value='groupe6'>groupe 6</option>
						<option value='groupe7'>groupe 7</option>
						<option value='groupe8'>groupe 8</option>
						<option value='groupe9'>groupe 9</option>
						<option value='groupe10'>groupe 10</option>
						<option value='groupe11'>groupe 11</option>
						<option value='groupe12'>groupe 12</option>
						<option value='groupe13'>groupe 13</option>
						<option value='groupe14'>groupe 14</option>
						<option value='groupe15'>groupe 15</option>
						<option value='groupe16'>groupe 16</option>
						<option value='groupe17'>groupe 17</option>
						<option value='groupe18'>groupe 18</option>
						<option value='groupe19'>groupe 19</option>
						<option value='groupe20'>groupe 20</option>
                    </select>
                </p>
              <p align='center'><input type='submit' value='Valider'/></p>
          </form>
        </div>
      </aside>
      <footer>
		
        NSI LFT<br/>
		Terminale, Bases de données.
	
      </footer>
  </body>