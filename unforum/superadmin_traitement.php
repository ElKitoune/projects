<?php
session_start();
require_once 'config.php'; // On inclu la connexion à la bdd

if(!empty($_POST['upgrade']) && !empty($_POST['upgrade'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $nbr = $bdd->prepare('UPDATE utilisateurs SET administrateur = 1 WHERE pseudo = ?');
    $nbr->execute(array($pseudo));

    header('Location:superadmin.php?reg_err=success');

}

     $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
     $req->execute(array($_SESSION['user']));
     $data = $req->fetch();
     $pseudo=$data['pseudo'];
            
     if(isset($_GET['id']) AND !empty($_GET['id'])) {
         $suppr_id = htmlspecialchars($_GET['id']);
         $suppr = $bdd->prepare('UPDATE utilisateurs SET administrateur = 1 WHERE id = ?');
         $suppr->execute(array($suppr_id));
         header('Location:superadmin.php');
     }

     if(isset($_GET['is']) AND !empty($_GET['is'])) {
        $suppr_id = htmlspecialchars($_GET['is']);
        $suppr = $bdd->prepare('UPDATE utilisateurs SET administrateur = 0 WHERE id = ?');
        $suppr->execute(array($suppr_id));
        header('Location:superadmin.php');
    }
if(!empty($_POST['down']) && !empty($_POST['down'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $nbr = $bdd->prepare('UPDATE utilisateurs SET administrateur = 0 WHERE pseudo = ?');
    $nbr->execute(array($pseudo));

    header('Location:superadmin.php');

}