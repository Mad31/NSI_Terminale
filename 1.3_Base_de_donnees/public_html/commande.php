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
	  <?php
			$servername = 'localhost';
			$username = $_GET['groupe'];
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
			while($row = mysqli_fetch_assoc($result)) {
					if ($row['email'] == $_GET['login'] and $row['mot_de_passe'] == (int)$_GET['password'])
					{$foo = true; }
					}
			} 
			
			// si l'utilisateur n'a pas été identifié on revient à l'index.
			if ($foo == false)  { echo 'Connexion non réussie'; }
			else { echo 'Connexion échouée'} ;
        ?>
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

      </main>
      <aside>
        <div>
          <h3>Commander</h3>
          Cette page vous permettra de commander les vins de notre production à partir de notre strock.
        </div>
        <div>
          <h3>Identifiez-vous !</h3>
          <h4>Je suis déjà inscrit</h4>
          <form>
              <p>Login : <input type='text' name='login'/></p>
              <p>Mot de passe : <input type='password' name='password'/></p>
			  <p>Groupe de travail : <br/>
                    <select name='groupe'>
						<option value='groupetest'>groupe test</option>
                        <option value='groupe1'>groupe 1</option>
                        <option value='groupe2'>groupe 2</option>
                        <option value='groupe3'>groupe 3</option>
						<option value='groupe4'>groupe 4</option>
                    </select>
                </p>
              <p><input type='submit' value='Valider'/></p>
          </form>
        </div>
      </aside>
      <footer>
		
        NSI LFT<br/>
		Terminale, Bases de données.
	
      </footer>
  </body>