<!DOCTYPE html>
<html lang="fr">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>inscription</title>
  <link href="assets/css/inscription.css" rel="stylesheet">
  <link href="assets/css/style-navbar.css" rel="stylesheet">
  </head>
  <header>
    <img src="assets/image/1.png" alt="Logo" class="logo"/>
    <nav>
      <a class="a-navbar" href="index.html">ACCEUIL</a>
      <a class="a-navbar" href="#">OUVRIR</a>
      <a class="a-navbar"  href="#">REGARDER</a>
      <a class="a-navbar" href="#">CONNEXION</a>
      <a class="a-navbar" href="inscription.php">INSCRIPTION</a>
      <div class="animation start-home"></div>
    </nav>
  </header>
  <body>
    <div class="main-container">
      <h1> Bienvenue sur Unforum.com !<br> Le site de discussions et d'entraide</h1>
    </div>
    <div class="inscription">
      <div class="sous-inscription">
        <h2>Inscription</h2>
        <div class="formulaire">
          <form action="inscription_traitement.php" method="post">
            <input type="text" name="pseudo" class="input-formulaire" placeholder="Pseudo" required="required" autocomplete="off">
            <input type="email" name="email" class="input-formulaire" placeholder="Email" required="required" autocomplete="off">
            <input type="password" name="password" class="input-formulaire" placeholder="Mot de passe" required="required" autocomplete="off" id="myInput">
            <input type="password" name="password_retype" class="input-formulaire" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off" >
            <img src="assets/image/eye.png" alt="Logo" class="password-toggle" onclick="myFunction(this)"/>
            <input type="checkbox" class="CGU" name="checkboxCGU" required="required">
            <label for="checkboxCGU" class="CGU"> J'ai lu et j'accepte les CGU</label>   
            <div class="captcha">   
              <?php 
              $captcha1=(rand(0,10));
              $captcha2=(rand(0,10));
              echo("<p class='CGU'> $captcha1 + $captcha2 =</p>")
              ?>
              <input type="text" name="captcha" class="input-captcha" required="required" autocomplete="off">
            </div>
            <button class="button-inscription" type="submit">Inscription</button>
          </form>
          <?php
          require_once 'config.php'; // On inclu la connexion à la bdd
                $sql = "SELECT * from utilisateurs";
                $request = $bdd->query($sql);
                while($row = $request->fetch()){
                    echo $row["pseudo"];
                }




?>
          
        </div>
      </div>
    </div>
  </body>
  <footer>
    <a class="a-footer" href="#">Mentions légales</a>
    <a class="a-footer" href="#">Vos informations personnelles</a>
    <a class="a-footer" href="#">Conditions générales d'utilisation</a>
    <p class="copyright">Copyright © 2023 Tous droits réservés</p>
  </footer>
</html>
<script>
function myFunction(image) {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
    image.src = 'assets/image/eye2.png';
  }else {
    x.type = "password";
    image.src = 'assets/image/eye.png';
  }
}
</script>