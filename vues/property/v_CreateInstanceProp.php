<?php
echo"**Verifiez que votre type de valeur correspond bien a votre valeur saisie<br><br>";
//Récupérer la valeur de l'instance appellé depuis v_createTypePlate
$_SESSION['typePlate']=$_GET['typePlate'];
$typePlate=$_SESSION['typePlate'];

echo'<form method="POST" action="index.php?uc=pageCreateProp&action=CreerInstanceProp&typePlate='.$typePlate.'">';
$result=mysql_query("SELECT DISTINCT ip.id, i.name AS name_i, p.name AS name_p, ip.valueid, ip. value_type
                    FROM db_instance i, db_instanceprop ip, db_property p
                    WHERE i.id=ip.instanceid
                    AND ip.propertyid=p.id
                    AND i.name='".$typePlate."'");
echo'<TABLE border=1>';
    echo' <TR> ';
    echo'<TH>instance_name</TH> ';
    echo'<TH>name_property</TH> ';
    echo'<TH>value</TH> ';
    echo'<TH>type value</TH> ';
    echo'<TH>action</TH> ';
    echo' </TR>'; 
while($ligne=mysql_fetch_array($result)){
    $instProp=$ligne['name_i'];
    $property=$ligne['name_p'];
    $value=$ligne['valueid'];
    $typevalue=$ligne['value_type'];
    $idInstanceProp=$ligne['id'];
    echo' <TR> ';
    echo'<TH>'.$instProp.'</TH> ';
    echo'<TH>'.$property.'</TH> ';
    echo'<TH>'.$value.'</TH> ';
    echo'<TH>'.$typevalue.'</TH> ';
    echo'<TH><a href="index.php?uc=pageCreateProp&action=CreerInstanceProp&ip_suppr='.$idInstanceProp.'&typePlate='.$typePlate.'"><img src="images/delete.gif"/></TH> ';
    echo' </TR>'; 
}
echo'<TR>' ;
echo'<TH>'.$_GET['typePlate'].'</TH> ';
$sql=mysql_query("SELECT * FROM db_property ");
echo'<TH><SELECT name="name_prop" size="1">';
    while($nameclass=mysql_fetch_array($sql)){
      $type2=$nameclass['name'];
      $idprop=$nameclass['id'];
      echo'<OPTION>'.$idprop.' : '.$type2;
    }    
echo'</SELECT></TH>';
echo'<TH><INPUT type="text" placeholder="Ajouter une valeur" name="value" size="15"></TH> ';
echo'<TH><SELECT name="type" size="1">';
echo"<option>1: vocab</option><option>2: date</option><option>3: varchar2</option><option>4: number</option><option>5: boolean</option>";
 echo'</SELECT></TH>';
echo'<TH><button  id="Send"  type="submit" name="btn_val" placeholder="Valider"> Valider </button> ';
echo'</TR>' ;
echo '</table>';
echo'</form>';

echo'<form method="POST" action="index.php?uc=pageCreateProp&action=retourCreatePlateType">';
echo'<button  id="Send"  type="submit" name="retour" placeholder="Valider"> retour </button>';
echo'</form>';