<?php

session_start();
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'CreerUser';
}
$action=$_REQUEST['action'];
include('pdo.php');
switch($action){    
    case 'CreerUser':{
        if(isset($_GET['type'])){
            if($_GET['type']=='user'){
                include('vues/users/v_users.php');
            }
        }
        break; 
    }
    case 'Users':{
        if(isset($_GET['type'])){
            $type=$_GET['type'];
            if ($type=='creerUser'){
                include ('vues/users/v_createUser.php');
            }
            else if ($type=='modifierUser'){
                include ('vues/users/v_updateUser.php');
            }
        }
        break;
    }
    case 'CreateUsers':{
        $name=$_POST['name'];
        $firstname=$_POST['firstName'];
        $password=$_POST['password'];
        $password2=$_POST['password2'];
        if (isset($_POST['btn_val'])){
            if($name!='' && $firstname!='' && $password!='' &&$password2!=''){
                if($password==$password2){
                    $login=$firstname[0].$name;
                    $sql=  mysql_query("insert into db_users values ('','".$login."','".$password."','".$name."','".$firstname."')");
                }
                else{
                    echo 'mot de passe incorrect';
                }
            }
            else {
                echo 'veuillez remplir tout les champs avant de valider ';
            }
            include ('vues/users/v_createUser.php');
        }
        break;
    }
        case 'retourDemandeForm':{
        include ('vues/v_demandeForm.php');
        break;
    }
}