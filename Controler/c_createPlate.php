<?php
session_start();
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'CreerPlaque';
}
$action=$_REQUEST['action'];
include('pdo.php');
switch($action){
    //Controleur appellé dans v_demandeForm.php
    case 'CreerPlaque':{
        if(isset($_GET['type'])){
            if($_GET['type']=='plate'){
                include('vues/plate/v_createPlate.php');
            }    
        }
        break;
    }
    //Controleur appellé dans v_createPlate.php
    case 'CreerTypePlaque':{
        if(isset($_GET['typePlate'])){
            $typePlate2=$_GET['typePlate'];
            if ($typePlate2=='mother'){
                include ('vues/plate/v_createMotherPlate.php');
            }
            else if($typePlate2=='daughter'){
                include ('vues/plate/v_createDaughterPlate.php');
            }
            else if($typePlate2=='layout'){
                include ('vues/plate/v_plateLayoutEditor.php');
            }
            else if($typePlate2=='quantity'){
                include ('vues/plate/v_plateQty.php');
            }
            else if($typePlate2=='selectMap'){
                include ('vues/plate/v_selectMap.php');
            }
        }
        break;   
    }
    //Controleur appellé dans v_createMotherPlate
    case 'CreerMotherPlate':{
        $nbrow=$_POST['dimRow'];
        $nbcol=$_POST['dimCol'];
        //$typeLayout=$_POST['typeLayout'];
        $instance=$_POST['type'];
        $barcode=$_POST['barcode'];
        $name=$_POST['name'];
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        break;
    
    }
    // Insertion d'une map wells dans la base de données. 
    case 'CreerMapWells':{
        $rows=$_POST['rows'];
        $col=$_POST['columns'];
        $names=$_POST['names'];
        $i=0;
        
        //Récuperation des données, sans les espaces.
        $recup_r = (explode(" ", $rows));
        $recup_c = (explode(" ", $col));
        $recup_n = (explode(" ", $names));
        for ($i=0; $i<count($recup_r); $i++){
            //$sql=mysql_query("insert into db_map values ('',2,'".$recup_r[$i]."','".$recup_c[$i]."','".$recup_n[$i]."')");
            echo'<br>';
            $sql="insert into db_map values ('',2,'".$recup_r[$i]."','".$recup_c[$i]."','".$recup_n[$i]."')";
            echo $sql;    
        }
        break;
    }
    case 'CreerMapQuantity':{
        $rows=$_POST['rows'];
        $col=$_POST['columns'];
        $val=$_POST['values'];
        $unit=$_POST['units'];
        $i=0;
        $recup_row=(explode(" ",$rows));
        $recup_col=(explode(" ",$col));
        $recup_val=(explode(" ",$val));
        $recup_unit=(explode(" ",$unit));
        for ($i=0; $i<count($recup_row);$i++){
            echo $recup_row[$i].' '.$recup_col[$i].' '.$recup_val[$i].' '.$recup_unit[$i].'<br>';
        }
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        break;
    }
    case 'demandeMap':{
        echo 'test';
        break;
    }
    case 'retourDemandeForm':{
        include ('vues/v_demandeForm.php');
        break;
    }
    
    case 'retourCreatePlate':{
        include ('vues/plate/v_createPlate.php');
        break;
    }
}
