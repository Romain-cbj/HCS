<?php
session_start();
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'CreerProp';
}
$action=$_REQUEST['action'];
include('pdo.php');
switch($action){    
    case 'CreerProp':{
        if(isset($_GET['type'])){
            if($_GET['type']=='prop'){
                include('vues/property/v_createProp.php');
            }
        }
        break; 
    }
    case 'CreerTypeProp':{
        /*if(isset($_POST['typeProp'])){
            $typeProp=$_POST['typeProp'];
            if ($typeProp=='plateType'){
                include ('vues/property/v_CreatePlateType.php');
            }
            else if ($typeProp=='class'){
                include ('vues/property/v_CreateClass.php');
            }
            else if ($typeProp=='TypeValue'){
                include ('vues/property/v_createValues.php');
            }
            else if ($typeProp=='property'){
                include('vues/property/v_createProperty.php');
            }
        }*/
        if(isset($_GET['typeProp'])){
            $typeProp=$_GET['typeProp'];
            if ($typeProp=='instance'){
                include ('vues/property/v_CreatePlateType.php');
            }
            else if ($typeProp=='class'){
                include ('vues/property/v_CreateClass.php');
            }
            else if ($typeProp=='typeValues'){
                include ('vues/property/v_createValues.php');
            }
            else if ($typeProp=='property'){
                include('vues/property/v_createProperty.php');
            }   
        }
        break;
    }
    //------------------------------------Appellé dans la page v_createClass.php---------------------------------------\\    
    case 'CreerClass':{ 
        if (isset($_POST['btn_val'])){
            $typeClass=$_POST['class'];
            if($typeClass !=null){
                $sql=mysql_query("insert into db_class values ('','".$typeClass."',1)");
            }
            else{
                echo 'veuillez saisir une valeur';
            }
        }
        if (isset($_GET['class_suppr'])){
            $class=$_GET['class_suppr'];
            $sql=mysql_query('select name from db_class ');
            while($ligne=mysql_fetch_array($sql)){
                if($_GET['class_suppr']==$ligne['name']){
                    $result=$_GET['class_suppr'];
                    $sql2=mysql_query("Delete from db_class where name='".$result."'"); 
                }
            }
        }
        include ('vues/property/v_createClass.php');
        break;
        
    }
    //---------------------------------Appellé depuis la page v_CreatePlateType------------------------------------\\
    case 'CreerTypePlaque':{
        if(isset($_POST['Valider'])){
            $typePlateProp=$_POST['plateTypeProp'];
            $nameclass=$_POST['class'];
            if($typePlateProp!=null){
                $sql=mysql_query("insert into db_instance values ('','".$typePlateProp."','".$nameclass[0]."',1)");
            }
            else{
                //Si aucune valeur n'est saisie dans le champs name_instance
                
                echo'<SCRIPT language=javascript>';
                    echo'alert("Veuillez saisir une valeur");';
                echo'</SCRIPT>';
                
            }
        }
        if (isset($_GET['idInstance'])){
            $id=$_GET['idInstance'];
            $sql=mysql_query('select id from db_instance ');
            while($ligne=mysql_fetch_array($sql)){
                if($id==$ligne['id']){
                    $sql2=mysql_query("Delete from db_instance where id='".$id."'"); 
                }
            }
        }
        include ('vues/property/v_CreatePlateType.php');
        break;
    }
    
    //------------------------------Appellé depuis la page v_createInstanceProp------------------------------\\
    case 'CreerInstanceProp':{
        if(isset($_POST['btn_val'])){
            $_SESSION['typePlate']=$_GET['typePlate'];
            $typePlate=$_SESSION['typePlate'];
            $typeVal=  substr($_POST['type'],3 );
            $value=$_POST['value'];
            $propertyid=substr($_POST['name_prop'],0,2);
            if($value!=''){
                //Ajout d'une valeur (vocabulaire) si elle n'existe pas dans la table
                if($typeVal=='vocab'){
                   $sql_vocab=mysql_query('select name from db_vocab ');
                   while($ligne=mysql_fetch_array($sql_vocab)){
                        if($_POST['value']!=$ligne['name']){
                            $sql=mysql_query("insert into db_vocab values ('','".$_POST['value']."','',1 )");
                        }
                    }  
                }
                //Ajout d'une valeur (date) si elle n'existe pas dans la table
                else if($typeVal=='date'){
                   $sql_date=mysql_query('select value from db_datetime ');
                   while($ligne=mysql_fetch_array($sql_date)){
                        if($_POST['value']!=$ligne['value']){
                            $sql=mysql_query("insert into db_datetime values ('','".$_POST['value']."')");
                        }
                    }  
                }
                //Ajout d'une valeur (varchar2) si elle n'existe pas dans la table
                else if($typeVal=='varchar2'){
                   $sql_string=mysql_query('select value from db_string ');
                   while($ligne=mysql_fetch_array($sql_string)){
                        if($_POST['value']!=$ligne['value']){
                            $sql=mysql_query("insert into db_string values ('','".$_POST['value']."')");
                        }
                    }  
                }
                //Ajout d'une valeur (number) si elle n'existe pas dans la table
                else if($typeVal=='number'){
                   $sql_number=mysql_query('select value from db_int ');
                   while($ligne=mysql_fetch_array($sql_number)){
                        if($_POST['value']!=$ligne['value']){
                            $sql=mysql_query("insert into db_int values ('','".$_POST['value']."')");
                        }
                    }  
                }
                //Ajout d'une instance de propriété
                $sql_instance=mysql_query("select id from db_instance where name='".$typePlate."' ");
                while($ligne=mysql_fetch_array($sql_instance)){
                    $id_Instance=$ligne['id'];
                    echo $id_Instance;
                    $sql=mysql_query("insert into db_instanceprop values ('',".$id_Instance.",".$propertyid.",'".$value."', '".$typeVal."')");
                }
            }
            else{ 
                //Si aucune valeur n'est saisie dans le champs value...
                echo'<SCRIPT language=javascript>';
                    echo'alert("Veuillez saisir une valeur");';
                echo'</SCRIPT>';
                
            }
        }
        //Supprimer une instance
        if(isset($_GET['ip_suppr'])){
            $id=$_GET['ip_suppr'];
            $sql=  mysql_query("select id from db_instanceprop");
            while ($ligne=  mysql_fetch_array($sql)){
                if($id==$ligne['id']){
                    $sql2=  mysql_query("delete from db_instanceprop where id=".$id."");
                }
            }
        }
        include ("vues/property/v_CreateInstanceProp.php");
        break;
    }
    
    
    //------------------------Appellé depuis la page v_createProp.php----------------------------------\\
    case 'CreerPropriete':{
        //Ajouter une propriété
        if(isset($_POST['Valider'])){
            $name_property=$_POST['nameProp'];
            $type=  substr($_POST['type'],2);
            $typevocab=$_POST['voctype'];
            $nameclass=$_POST['class'];
            if($name_property!=null){
                $sql=mysql_query("insert into db_property values ('','".$name_property."','".$type."',".$nameclass[0].",".$typevocab[0].",1)");   
            }
            else{
                echo'<SCRIPT language=javascript>';
                    echo'alert("Veuillez saisir une valeur");';
                echo'</SCRIPT>';
                
            }
        }
        //Supprimer une propriété
        if(isset($_GET['idProp'])){
            $id=$_GET['idProp'];
            $sql=  mysql_query("select id from db_property");
            while ($ligne=  mysql_fetch_array($sql)){
                if($id==$ligne['id']){
                    $sql2=  mysql_query("delete from db_property where id=".$id."");
                }
            }
        }
        include('vues/property/v_createProperty.php');
        break;
    }
    //------------------------Appellé depuis la page v_createValues.php----------------------------------\\
    case 'CreerValeur':{
        //Ajouter une valeur (bool/date/string/number)
        if(isset($_POST['bool'])){
            $bool=$_POST['bool'];
            if($bool!=null){
                $sql=mysql_query("insert into db_bool values ('','".$bool."')");
            }
        }
        if(isset($_POST['date'])){
            $date=$_POST['date'];
            if($date!=null){
                $sql=mysql_query("insert into db_datetime values ('','".$date."')");
            }
        }
        if(isset($_POST['string'])){
            $string=$_POST['string'];
            $sql=mysql_query("insert into db_string values ('','".$string."')");
            
        }
        if(isset($_POST['number'])){
            $number=$_POST['number'];
            if($number!=null){
                $sql=mysql_query("insert into db_int values ('','".$number."')"); 
            }
        }        
    
        //Supprimer une valeur (bool/date/string/number)
        if(isset($_GET['idValuesBool'])){
            $id=$_GET['idValuesBool'];
            $sql=  mysql_query("select value from db_bool");
            while ($ligne=  mysql_fetch_array($sql)){
                if($id==$ligne['value']){
                    $sql2=  mysql_query("delete from db_bool where value=".$id."");
                }
            }            
        }
        if(isset($_GET['idValuesDate'])){
            $id=$_GET['idValuesDate'];
            $sql=  mysql_query("select value from db_datetime");
            while ($ligne=  mysql_fetch_array($sql)){
                if($id==$ligne['value']){
                    $sql2=  mysql_query("delete from db_datetime where value='".$id."'");
                }
            }
        }
        if(isset($_GET['idValuesString'])){
            $id=$_GET['idValuesString'];
            $sql=  mysql_query("select value from db_string");
            while ($ligne=  mysql_fetch_array($sql)){
                if($id==$ligne['value']){
                    $sql2=  mysql_query("delete from db_string where value='".$id."'");
                }
            }            
        }
        if(isset($_GET['idValuesNumber'])){
            $id=$_GET['idValuesNumber'];
            $sql=  mysql_query("select value from db_int");
            while ($ligne=  mysql_fetch_array($sql)){
                if($id==$ligne['value']){
                    $sql2=  mysql_query("delete from db_int where value=".$id."");
                }
            }            
        }
        include ('vues/property/v_createValues.php');
       break;
    }

    //-------------------------------------pour revenir en arrière--------------------------------------\\
    case 'retourCreateproperty':{
        include ('vues/property/v_createProp.php');
        break;
    }
    case 'retourDemandeForm':{
        include ('vues/v_demandeForm.php');
        break;
    }
    case 'retourCreatePlateType':{
        include ('vues/property/v_CreatePlateType.php');
        break;
    }
}
