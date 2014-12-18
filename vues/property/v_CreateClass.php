<?php
/*************************Permet d'ajouter et de visualiser les classes ***************************************/
$result=mysql_query("SELECT * FROM db_class order by name");
echo'<form method="POST" action="index.php?uc=pageCreateProp&action=CreerClass">';
echo'<TABLE border=1 width=15% height=40>';
while($ligne=mysql_fetch_array($result)){
    $class=$ligne['name'];
    echo' <TR> ';
    echo'<TH>'.$class.'</TH> ';
    echo'<TH><a href="index.php?uc=pageCreateProp&action=CreerClass&class_suppr='.$class.'"><img src="images/delete.gif"/></TH> ';
    echo' </TR>'; 
}
echo'<TR>' ;
echo'<TH><INPUT type="text" placeholder="Ajouter une classe" name="class" size="15"></TH> ';
echo'<TH><button  id="Send"  type="submit" name="btn_val" placeholder="Valider"> Valider </button> ';
echo'</TR>' ;
echo'</TABLE> ';
echo'</form>';

echo'<form method="POST" action="index.php?uc=pageCreateProp&action=retourDemandeForm">';
echo'<button  id="Send"  type="submit" name="Valider" placeholder="Valider"> retour </button>';
echo'</form>';

?>