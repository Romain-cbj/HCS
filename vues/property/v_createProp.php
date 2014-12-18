
Quelle type de propri&eacute;t&eacute; voulez vous cr&eacute;er ? <br>

<form method="POST" action="index.php?uc=pageCreateProp&action=CreerTypeProp">
    <br>
    <input type="radio"  name="typeProp" value="class">Class
    <br>
    <input type="radio"  name="typeProp" value="plateType">Plate Type
    <br>
    <input type="radio"  name="typeProp" value="property">Property
    <br>
    <input type="radio"  name="typeProp" value="TypeValue">Type Values
    <br><br>
    <button  id="Send"  type="submit" name="Valider" placeholder="Valider"> Valider </button>
    
</form>

<form method="POST" action="index.php?uc=pageCreateProp&action=retourDemandeForm">
<button  id="Send"  type="submit" name="Valider" placeholder="Valider"> retour </button>
</form>