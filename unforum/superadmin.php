
<?php
session_start();
require_once 'config.php'; // ajout connexion bdd 
$db= new PDO('mysql:host=localhost;dbname=yaya', 'root', ''); ?>


<?php

if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
}
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch(); ?>
<h1> Les utilisateurs présents dans la bdd sont les suivants </h1> <?php

if($data['superadmin']==1){ 
    $sql = "SELECT * from utilisateurs WHERE administrateur = 0";
    $request = $db->query($sql);
    while($row = $request->fetch()){ ?>
        <li><?php 
        echo $row["id"];
        echo $row["pseudo"]; ?><a href="superadmin_traitement.php?id=<?= $row['id']?>">up admin</a><?php
        echo $row["email"];
        echo $row["date_inscription"]; ?></li>
           <form action="superadmin_traitement.php" method="post">
                <select type="text" name="upgrade"><br><br>
                        <option> up to admin </option>
                </select>
                <button onclick="superadmin_traitement.php" class="btn btn-primary btn-lg">up</button></a>
            </form><?php
            

           
}
    } ?>
<h1> Les modo présents dans la bdd sont les suivants </h1> <?php
    $sql = "SELECT * from utilisateurs WHERE administrateur = 1";
    $request = $db->query($sql);
    while($row = $request->fetch()){ ?>
        <li><?php 
        echo $row["id"];
        echo $row["pseudo"];?><a href="superadmin_traitement.php?is=<?= $row['id']?>">down admin</a><?php
        echo $row["email"];
        echo $row["date_inscription"]; ?></li>
        <form action="superadmin_traitement.php" method="post">
            <select type="text" name="upgrade"><br><br>
                <option> down to user </option>
            </select>
            <button onclick="superadmin_traitement.php" class="btn btn-primary btn-lg">down</button></a>
        </form><?php                 
    } ?>

<h1> Les superadmins présents dans la bdd sont les suivants </h1> <?php
    $sql = "SELECT * from utilisateurs WHERE superadmin = 1";
    $request = $db->query($sql);
    while($row = $request->fetch()){ ?>
        <li><?php 
        echo $row["id"];
        echo $row["pseudo"];
        echo $row["email"];
        echo $row["date_inscription"]; ?></li> <?php                 
    } ?>
<h1> Ajouter un boug admin
<form action="superadmin_traitement.php" method="post">
    <input type="text" name="pseudo" placeholder="pseuudo">
            <select type="text" name="upgrade">
                <option> up to admin </option>
            </select>
            <button onclick="superadmin_traitement.php" class="btn btn-primary btn-lg">up</button></a>
        </form>
        <h1> tej un boug admin
        <form action="superadmin_traitement.php" method="post">
        <div class="form-group">
            <input type="text" name="pseudo" placeholder="pseuudo"></div>
                    <select type="text" name="down"><br><br>
                        <option> down to user </option>
                    </select>
                    <button onclick="superadmin_traitement.php" class="btn btn-primary btn-lg">down</button></a>
                </form> <?php

?>

        
   