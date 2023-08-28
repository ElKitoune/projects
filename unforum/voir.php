<?php 

    session_start();
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
   $db = new PDO('mysql:host=localhost;dbname=yaya', 'root', '');
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }
    

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();?>
   
<div class="row">

  <?php
  if($data['administrateur'] == 1){

        $sql = "SELECT * from ticket";

        $request = $db->query($sql);
        while($row = $request->fetch()){ ?>
            <div class="column">
            <p><?php echo $row["nom"]; ?></p>
            <p><?php echo $row["jeu"]; ?></p>
            <p> <?php echo $row["poste"]; ?></p>
            <p> <?php echo $row["grade"]; ?> </p>
            <p> <?php echo $row["com"]; ?> </p>
            <p> <?php echo $row["moyen_com"] ?> </p>| <a href="delete2.php?id=<?= $row['id']?>">Supprimer</a>    <input type="checkbox">aaa</input></li> 
            <div class="oui"> <?php 
                echo $row["pseudo"] ?> 
            </div>
        </div>


    <?php
        } 
    } ?>
  </div>
  <?php

      $pseudo = $data['pseudo'];
    if($data['administrateur'] == 0){
        $sql = "SELECT * from ticket";
    
        $request = $db->query($sql);
        while($row = $request->fetch()){ ?>
            <div class="column"><?php
            if($data['pseudo'] == $row["pseudo"]){ ?>
                <a href="delete2.php?id=<?= $row['id']?>">Supprimer</a>    <input type="checkbox">aaa</input><?php
            } ?>
            <li><?php echo $row["nom"];
            echo $row["jeu"];
            echo $row["poste"];
            echo $row["grade"];
            echo $row["com"];
            echo $row["moyen_com"]?></li>
        <?php
        }
    }
    ?>
  </div>
</div>
    



    <style>
        .oui{
            color:red;
        }
        .column {
            float: left;
             width: 30%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>