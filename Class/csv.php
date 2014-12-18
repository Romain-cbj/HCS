<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of csv
 *
 * @author rdesruelle
 */
class csv {
    
    function lire_csv($nom_fichier, $separateur =","){
        $row = 0;
        $donnee = array();   
        $f = fopen ($nom_fichier,"r");
        $taille = filesize($nom_fichier)+1;
        while ($donnee = fgetcsv($f, $taille, $separateur)) {
            $result[$row] = $donnee;
            echo $donnee[$row].'<br>';
            $row++;
            
        }
        
        fclose ($f);
        return $result;
    }
    
    function requete_insert($donnees_csv, $table){
        $insert = array();
        $i = 0;     
        while (list($key, $val) = @each($donnees_csv)){
        /*On ajoute une valeur vide ' ' en début pour le champs d'auto-incrémentation  s'il existe, sinon enlever cette valeur*/
            if ($i>0){
                $insert[$i] = "INSERT into ".$table." VALUES(' ',".$id_user.",'"    ;
                $insert[$i] .= implode("','", $val);
                $insert[$i] .= "')";                     
            }
            $i++;
        }      
        return $insert;
    }
    
  


}
