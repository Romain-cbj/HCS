<link href="style.css" rel="stylesheet" media="all" type="text/css"> 
<?php
echo'<form method="POST" action="index.php?uc=pageCreateProp&action=retourDemandeForm">';
echo'<button  id="Send"  type="submit" name="Valider" placeholder="Valider"> retour </button>';
echo'</form>';
//tableau bool
$result=mysql_query("SELECT * FROM db_bool");
echo'<form method="POST" action="index.php?uc=pageCreateProp&action=CreerValeur">';
echo'<TABLE border=1>';
echo' <TR> ';
echo'<TH>bool values</TH> ';
echo'<TH>action</TH> ';
echo' </TR> ';
while($ligne=mysql_fetch_array($result)){
    $vbool=$ligne['value'];
    echo' <TR> ';
    echo'<TH>'.$vbool.'</TH> ';
    echo'<TH><a href="index.php?uc=pageCreateProp&action=CreerValeur&idValuesBool='.$vbool.'"><img src="images/delete.gif"/></TH> ';
    echo' </TR>'; 
}
echo'<TR>' ;
echo'<TH><INPUT type="text" placeholder="Ajouter une valeur" name="bool" size="15"></TH> ';
echo'<TH><button  id="Send"  type="submit" name="Valider" placeholder="Valider"> Valider </button></TH>';
echo'</TR>' ;
echo'</TABLE> ';
echo'</form>';

//tableau date
$result2=mysql_query("SELECT * FROM db_datetime");
echo'<form method="POST" action="index.php?uc=pageCreateProp&action=CreerValeur">';
echo'<TABLE border=1>';
echo' <TR> ';
echo'<TH>date values</TH> ';
echo'<TH>action</TH> ';
echo' </TR> ';
while($ligne=mysql_fetch_array($result2)){
    $vdate=$ligne['value'];
    echo' <TR> ';
    echo'<TH>'.$vdate.'</TH> ';
    echo'<TH><a href="index.php?uc=pageCreateProp&action=CreerValeur&idValuesDate='.$vdate.'"><img src="images/delete.gif"/></TH> ';
    echo' </TR>'; 
}
echo'<TR>' ;
echo'<TH><INPUT type="text" placeholder="Ajouter une valeur" name="date" size="15"></TH> ';
echo'<TH><button  id="Send"  type="submit" name="Valider" placeholder="Valider"> Valider </button></TH>';
echo'</TR>' ;
echo'</TABLE> ';

echo'</form>';

//tableau string
$result3=mysql_query("SELECT * FROM db_string");
echo'<form method="POST" action="index.php?uc=pageCreateProp&action=CreerValeur">';
echo'<TABLE border=1>';
echo' <TR> ';
echo'<TH>string values</TH> ';
echo'<TH>action</TH> ';
echo' </TR> ';
while($ligne=mysql_fetch_array($result3)){
    $vstring=$ligne['value'];
    echo' <TR> ';
    echo'<TH>'.$vstring.'</TH> ';
    echo'<TH><a href="index.php?uc=pageCreateProp&action=CreerValeur&idValuesString='.$vstring.'"><img src="images/delete.gif"/></TH> ';
    echo' </TR>'; 
}
echo'<TR>' ;
echo'<TH><INPUT type="text" placeholder="Ajouter une valeur" name="string" size="15"></TH> ';
echo'<TH><button  id="Send"  type="submit" name="Valider" placeholder="Valider"> Valider </button></TH>';
echo'</TR>' ;
echo'</TABLE> ';
echo'</form>';

//tableau number
$result4=mysql_query("SELECT * FROM db_int ");
echo'<form method="POST" action="index.php?uc=pageCreateProp&action=CreerValeur">';
echo'<TABLE border=1>';
echo' <TR> ';
echo'<TH>number values</TH> ';
echo'<TH>action</TH> ';
echo' </TR> ';
while($ligne=mysql_fetch_array($result4)){
    $vnumber=$ligne['value'];
    echo' <TR> ';
    echo'<TH>'.$vnumber.'</TH> ';
    echo'<TH><a href="index.php?uc=pageCreateProp&action=CreerValeur&idValuesNumber='.$vnumber.'"><img src="images/delete.gif"/></TH> ';
    echo' </TR>'; 
}
echo'<TR>' ;
echo'<TH><INPUT type="text" placeholder="Ajouter une valeur" name="number" size="15"></TH> ';
echo'<TH><button  id="Send"  type="submit" name="Valider" placeholder="Valider"> Valider </button></TH>';
echo'</TR>' ;
echo'</TABLE> ';
echo'</form>';
