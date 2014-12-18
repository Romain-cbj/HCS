<?php
session_start();
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'seConnecter';
}
$action=$_REQUEST['action'];
include('pdo.php');
switch($action){    
    case 'seConnecter':{
       
       $login=$_POST['login'];
       $pass =$_POST['motdepasse'];
       $requete="SELECT * FROM db_users" ; 
       $resultat = mysql_query($requete)
       or die('probleme sur la requete'); 
       while($result = mysql_fetch_array($resultat))
       {
            $id = $result['login'];
            $password = $result['password'];
            if ($login==$id && $pass==$password)
            {
                $_SESSION['id']=$result[0];
                $_SESSION['login']=$result[1];
                include 'vues/v_demandeForm.php';
                
            }
        }
        
    }
}

?>
