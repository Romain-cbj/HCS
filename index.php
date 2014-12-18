<?php
if(!isset($_REQUEST['uc'])){
     $_REQUEST['uc'] = 'pageAccueil';
}
$uc=$_REQUEST['uc'];

switch($uc){
    
    case'pageAccueil':{
        
        include("controler/c_pageAccueil.php");break;
}
    case'pageAuthentification':{
        
        include("controler/c_connexion.php");break;
    }
    case'pageCreatePlate':{
        
        include("controler/c_createPlate.php");break;
    }
    case'pageCreateProp':{
        
        include("controler/c_createProp.php");break;
    }
        case'pageUsers':{
        
        include("controler/c_users.php");break;
    }
}