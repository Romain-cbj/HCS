<?php

// PAR DEFAUT : VUE PAGE D'ACCUEUIL
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'vuePageAccueil';
}
$action=$_REQUEST['action'];

switch($action){    
    case 'vuePageAccueil':{
        include("vues/v_authentification.php"); //On considere que si l'action séléctionnée est "vuePageAccueil" on affichera la vue accueil
        break;
    }
    case 'seDeconnecter':{
        session_start();
        if(isset($_SESSION['id']))
        {
            include("vues/v_authentification.php");
             //session_destroy();
        }

        break;
    }
    
}
?>

