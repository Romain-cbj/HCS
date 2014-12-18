<?php

$result=mysql_query("SELECT p.id, p.name AS name_p, v.typevocab AS name_v, c.name AS name_c, p.type
                    FROM db_property p, db_class c, db_vocabtype v
                    WHERE c.id=p.idclass
                    AND p.vocabtype=v.id");
echo'<form method="POST" action="index.php?uc=pageCreateProp&action=CreerPropriete">';
echo'<TABLE BORDER="1">' ;
echo' <TR> ';
    echo'<TH>name_property</TH> ';
    echo'<TH>type_property</TH> ';
    echo'<TH>type_vocab</TH> ';
    echo'<TH>name_class</TH> ';
    echo'<TH>action</TH> ';
    echo' </TR>'; 
while($ligne=mysql_fetch_array($result)){
    $np=$ligne['name_p'];
    $typeProp=$ligne['type'];
    $nv=$ligne['name_v'];
    $nc=$ligne['name_c'];
    $id=$ligne['id'];
    echo'<TR>';
    echo'<TH>'.$np.'</TH> ';
    echo'<TH>'.$typeProp.'</TH> ';
    echo'<TH>'.$nv.'</TH> ';
    echo'<TH>'.$nc.'</TH> ';
    echo'<TH><a href="index.php?uc=pageCreateProp&action=CreerPropriete&idProp='.$id.'"><img src="images/delete.gif"/></TH> ';
    echo' </TR>'; 
}
echo'<TR>' ;
echo'<TH><INPUT type="text" placeholder="Ajouter une propriete" name="nameProp" size="15"></TH> ';

echo'<TH><SELECT name="type" size="1">';
echo"<option>1: vocab</option><option>2: date</option><option>3: varchar2</option><option>4: number</option><option>5: boolean</option>";
 echo'</SELECT></TH>';
 
 $sql2=mysql_query("SELECT * FROM db_vocabtype ");
echo'<TH><SELECT name="voctype" size="1">';
    
    while($vocabtype=mysql_fetch_array($sql2)){
      $type3=$vocabtype['typevocab'];
      $idvocabtype=$vocabtype['id'];
      echo'<OPTION>'.$idvocabtype.': '.$type3;
    }
    echo'</SELECT></TH>';
    
$sql=mysql_query("SELECT * FROM db_class ");
echo'<TH><SELECT name="class" size="1">';
    while($nameclass=mysql_fetch_array($sql)){
      $type2=$nameclass['name'];
      $idClass=$nameclass['id'];
      echo'<OPTION>'.$idClass.': '.$type2;
    }
    echo'</SELECT></TH>';
echo'<TH><button  id="Send"  type="submit" name="Valider" placeholder="Valider"> Valider </button></TH> ';
echo'</TR>' ;
echo'</TABLE> ';
echo'</form>';

echo'<form method="POST" action="index.php?uc=pageCreateProp&action=retourDemandeForm">';
echo'<button  id="Send"  type="submit" name="Valider" placeholder="Valider"> retour </button>';
echo'</form>';