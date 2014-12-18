Quelle type de plaque voulez vous cr&eacute;er ? 

<br>
<form method="POST" action="index.php?uc=pageCreatePlate&action=CreerTypePlaque">
    
    <input type="radio"  name="typePlate" value="motherPlate">Mother Plate 
    <br>
    <input type="radio"  name="typePlate" value="daughterPlate">Daughter Plate
    <br>
    <button  id="Send"  type="submit" name="Valider" placeholder="Valider"> Valider </button>
</form>
<form method="POST" action="index.php?uc=pageCreatePlate&action=retourDemandeForm">
    <button  id="Send"  type="submit" name="Valider" placeholder="Valider"> retour </button>
</form>