<!DOCTYPE html>
<html lang="fr">	
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="css/cooperative.css">
    <script src="javascript/cooperative.js"  type="text/javascript"></script>
  </head>
  <body>
      <header>
	  		<?php
			$servername = 'localhost';
			$username = $_GET['groupe'].'admin';
			$password = 12345 ;
			$database = $_GET['groupe'];
            
            //On établit la connexion
            $conn = new mysqli($servername, $username, $password, $database);
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            $foo = false;
			$sql = "SELECT email, mot_de_passe FROM buveurs";
			$resultat = mysqli_query($conn, $sql);
			if (mysqli_num_rows($resultat) > 0) {
			// on parse pour vérifier
				while($row = mysqli_fetch_assoc($resultat)) {
					 if ($row['email'] == $_GET['login'] and $row['mot_de_passe'] == (int)$_GET['password'])
					{$foo = true; }
					}
			  }
			else {echo "Pas de résultats";}
			
			// si l'utilisateur n'a pas été identifié on revient à l'index.
			if ($foo == false)  { header('Location: echec.html');
				exit(); }
        ?>
	  	
		  <p class="flotte">
          <img src="images/cooperative.jpg" width="450" alt="cooperative" />
		  </p>
          <h1>La Coopérative</h1>
		  <h2>Activité 1.3 Implémenter une base de données</h2>
		  
      </header>
      <main>
	  
        <div class='shadowbox' align='center'>
			<p align='center'
			<h3 onmouseover="couleurtitre()">Bienvenue</h3>
			Nous sommes le <?php echo date("d:m:y")?> et il est <?php echo date("H:i:s");?>
			<br/>
			votre adresse IP est  <?php echo $_SERVER['REMOTE_ADDR'];?><br/>
			Ce script est exécuté sur le serveur <?php echo $_SERVER['SERVER_SOFTWARE'];?> qui se 
			trouve à l'adresse <?php echo $_SERVER['SERVER_ADDR']?>.<br/>
			Vous appartenez au groupe <?php echo $_GET['groupe']; ?> <br>
			</p>
		</div>
		<br/>
		<div class='shadowbox' align='center'>
			<h3 onmouseover="couleurtitre()">Voici le récapitulatif de votre commande :</h3>
			<table align='center'>
			<tr>
				<td width='35%' ><p> Cru </p></td><td width='10%'><p> Année </p></td> <td width='15%'><p> degrés</p></td>
			</tr>
			<?php 
			$sql = "SELECT nv, cru, annee, degre, stock FROM vins ;";
			$resultat = mysqli_query($conn, $sql);
			if (mysqli_num_rows($resultat) > 0) {
			// on parse la liste des vins
				while($row = mysqli_fetch_assoc($resultat)) {
					if(isset($_GET['commander']) && in_array($row['nv'], $_GET['commander'])){
						// On regarde si une commande n'a pas déjà été passée.
						$sql2 = "SELECT email,nv FROM commande WHERE nv='".$row['nv']."' AND email = '".$_GET['login']."';";
						$resultat2 = mysqli_query($conn, $sql2);
						if (mysqli_num_rows($resultat2) == 0) {
							echo "<tr><td>".$row['cru']."</td><td>".$row['annee']."</td><td>".$row['degre']."</td></tr>" ;
							$today = date("Y-m-d");
							$sql3 ="INSERT INTO commande (email, nv,date_commande, livraison_commande, quantite) 
							VALUES ('".$_GET['login']."','".$row['nv']."', '".$today."',0,2);";
							mysqli_query($conn, $sql3);}
						else { echo "<tr><td>".$row['cru']."</td><td colspan='2'> Ce vin est déjà commandé</td></tr>" ;}
					}
					}
			  }
			else {echo "<tr><td colspan='3'>Pas de vins en stock </td></tr>";}
			
			if (empty($_GET['commander'])) {
				echo "<tr><td colspan='3'>Pas de vins commandés </td></tr>";
				}
			echo "</table>";
			?>
			<h3 align-text='center'>Merci d'avoir passé une commande sur notre site, vous serez livré prochainement</h3>
			<br/>
			<a href="index.html"> Retour à l'accueil </a>
			<br/>
		</div>
		<br/>

      </main>
      <aside>
        <div>
          <h3>Commander</h3>
          Cette page récapitule les vins que vous avez commandés.
        </div>
        <div>
          <h3>Identifiez-vous !</h3>
          <h4>Je suis déjà connecté !</h4>
		  <br/>
		<?php 
			echo "Mon Login : ".$_GET['login'];
		?>
        </div>
      </aside>
      <footer>
		
        NSI LFT<br/>
		Terminale, Bases de données.
	
      </footer>
  </body>