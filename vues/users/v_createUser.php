<?php
/*************************Permet d'ajouter et de visualiser les classes ***************************************/
$result=mysql_query("SELECT * FROM db_users");
echo'<TABLE border=1 width=15% height=40>';
    echo' <TR> ';
    echo'<TH>login</TH> ';
    echo'<TH>name</TH> ';
    echo'<TH>first name</TH> ';
    echo'<TH>action</TH> ';
    echo' </TR>'; 
while($ligne=mysql_fetch_array($result)){
    $login=$ligne['login'];
    $nom=$ligne['nom'];
    $prenom=$ligne['prenom'];
    echo' <TR> ';
    echo'<TH>'.$login.'</TH> ';
    echo'<TH>'.$nom.'</TH> ';
    echo'<TH>'.$prenom.'</TH> ';
    echo'<TH><a href="index.php?uc=pageCreateProp&action=CreerClass&class_suppr='.$login.'"><img src="images/delete.gif"/></TH> ';
    echo' </TR>'; 
}
echo'</TABLE> ';
?>
<br><br>
<form method="POST" action="index.php?uc=pageUsers&action=CreateUsers">
    Saisir votre nom: <br>
<INPUT type="text" placeholder="Name" name="name" size="15"><br><br>
Saisir votre prenom: <br>
<INPUT type="text" placeholder="Fisrt Name" name="firstName" size="15"><br><br>
Saisir votre mot de passe: <br>
<INPUT type="password" placeholder="Password" name="password" size="15"><br><br>
Confirmer votre mot de passe: <br>
<INPUT type="password" placeholder="Password" name="password2" size="15"><br><br>
<button  id="Send"  type="submit" name="btn_val" placeholder="Valider"> Valider </button> 
</form>

<form method="POST" action="index.php?uc=pageUsers&action=retourDemandeForm">
<button  id="Send"  type="submit" name="Valider" placeholder="Valider"> retour </button>
</form>

