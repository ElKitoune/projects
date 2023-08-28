<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Espace membre</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
 </head>
  <body>
       
                <?php 
                        if(isset($_GET['err'])){
                            $err = htmlspecialchars($_GET['err']);
                            switch($err){
                                case 'current_password':
                                    echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                                break;

                                case 'success_password':
                                    echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                                break; 
                            }
                        }
                    ?>


            
                    
 
                           
                        <!--<h1 class="p-5">Bonjour <?php echo $data['pseudo']; ?> !</h1> -->
                        <div class="fixe">
                        <div class="border-top">
                            <ul>
                            <li> <div class="tittle"><a href="landing.php" class="e">elkitoune.fr</a></div></li> 
                            <li><div class="nav"><a href="landing.php" class="h">home</a></div></li>
                            <li><div class="nav"><a href="about.php" class="a">about</a></div></li>
                        </ul>
                    </div>
                        </div>
                        <div class="degra">

                            <br>
                            <h2> elkitoune.fr </h3>
                            <h3> Site de recrutement en ligne </h3>
                        </div>
                 
                        <div class="border-mid">
                          
                        <div class="boutonMain-place"> 
                          <a href="create.php" class="boutonMain"><div class="boutonMaintxt-place">Creer</div></a>
                        <a type="button" href="voir.php" class="boutonMain" ><div class="boutonMaintxt-place">voir</div></a>
                        </div>
                        </div>
                        <div class="border-end">
                        
                    <div class="boutonEnd"> <?php
                    if($data['superadmin']==1){ ?>
                        <li><a type="button" href="superadmin.php" class="d" >
                        Compte</a></li>  <?php
                        } ?>
                        <li><a href="deconnexion.php" class="d">Déconnexion</a></li>
                        <!-- Button trigger modal -->
                        <li><button type="button" class="button button1" data-toggle="modal" data-target="#change_password">
                          Changer mon mot de passe</li>
                    </div>

                       
                 
                   
                              
                        
               

            </div>
        </div>    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html> 

<style>
.border-top{
    position:absolute;
     position:fixed;
    background-color:rgb(0,0,0);
    padding-bottom:5%;
    margin-left:-2%;
    margin-top:-2%;
    padding-right:100%;
    
    border: 0.5px solid grey;

}
.tittle{

    position:absolute;
    position:fixed;
    margin-left:22%;
    margin-top:2%;
margin-right:10%;  
}
.e{
font-size:250%;
color:white;
text-decoration:none;
}

}
ul {

    list-style-type: none;

  overflow: hidden;
}

li {
  float: left;
 
}



.nav{
    position:absolute;
    position:fixed;
    margin-left:75%;
    margin-top:3%;
    margin-right:10%; 
}



.h{

font-size:135%;
color:white;
text-decoration:none;

}
.a{

font-size:135%;
color:grey;
text-decoration:none;
margin-left:150%;
}


.degra{
    background: linear-gradient(rgb(117,74,41),60%, rgb(188,117,63));  
    /*https://developer.mozilla.org/fr/docs/Web/CSS/CSS_Images/Using_CSS_gradients */
    margin-left:-3%;
    margin-right:-3%;
    padding-bottom:8%;
}
h2{
    font-size:400%;
    color:white;
    text-align:center;
    padding-top:4%
}
h3{
    font-size:300%;
    color:white;
    text-align:center;
  
}


.border-mid{

background-color: white;
padding-bottom:20%;
}
.boutonMain{
text-decoration:none;
display: inline-block;
background-color: rgb(149,94,42);
border-radius: 50%;
border: 4px double #cccccc;
color: #eeeeee;
text-align: center;
font-size: 200%;



width: 325px;
height: 325px;

-webkit-transition: all 0.5s;
-moz-transition: all 0.5s;
-o-transition: all 0.5s;
transition: all 0.5s;
cursor: pointer;

}
.boutonMain:hover 
{
  background-color: #000000;

}
.boutonMain-place{
margin-left: 32%;
padding-top:10%;


}
.boutonMaintxt-place{
padding-top:45%;}



.border-end{
    background-color:black;
            padding-bottom:17%;
    margin-bottom::-3%;
    margin-right:-3%;
    
    margin-left:-3%;
}
.boutonEnd{
position:absolute;
padding-top:15%;
margin-left:5%;
}
.d{
color:white;
}
</style>