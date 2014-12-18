<?php
echo"**Si vous souhaitez acceder aux propri&eacute;t&eacute;s d'une instance, cliquez sur cette instance<br><br>";
$result=mysql_query("SELECT i.id, i.name AS name_i, c.name AS name_c 
                    FROM db_instance i, db_class c 
                    WHERE i.idClass=c.id order by 1");
echo'<form method="POST" action="index.php?uc=pageCreateProp&action=CreerTypePlaque">';
echo'<TABLE BORDER="1">' ;
echo' <TR> ';
echo'<TH><h4>name_instance</h4></TH> ';
echo'<TH><h4>name_class</h4></TH> ';
echo'<TH><h4>action</h4></TH> ';
echo' </TR>'; 
while($ligne=mysql_fetch_array($result)){
    $type=$ligne['name_i'];
    $class=$ligne['name_c'];
    $id=$ligne['id'];
    echo' <TR> ';
    echo'<TH><a href="index.php?uc=pageCreateProp&action=CreerInstanceProp&typePlate='.$type.'">'.$type.'</TH> ';
    echo'<TH>'.$class.'</TH> ';
    echo'<TH><a href="index.php?uc=pageCreateProp&action=CreerTypePlaque&idInstance='.$id.'"><img src="images/delete.gif"/></TH> ';
    echo' </TR>'; 
}
echo'<TR>' ;
echo'<TH><INPUT type="text" placeholder="Ajouter un type" name="plateTypeProp" size="15"></TH> ';
$sql=mysql_query("SELECT * FROM db_class ");
echo'<TH><SELECT name="class" size="1">';
    while($nameclass=mysql_fetch_array($sql)){
      $type2=$nameclass['name'];
      $idClass=$nameclass['id'];
      echo'<OPTION>'.$idClass.': '.$type2;
    }
echo'</SELECT></TH>';
echo'<TH><button  id="Send"  type="submit" name="Valider" placeholder="Valider onClick="Message()"> Valider </button></TH> ';
echo'</TR>' ;
echo'</TABLE> ';
echo'</form>';
echo'<form method="POST" action="index.php?uc=pageCreateProp&action=retourDemandeForm">';
echo'<button  id="Send"  type="submit" name="Valider" placeholder="Valider"> retour </button>';
echo'</form>';

