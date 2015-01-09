
<form method="POST" action="index.php">
      <?php
    //  SI L'UTILISATEUR EST AUTHENTIFIE
    if(isset($_SESSION['id']))
    {
        $id=$_SESSION['id'];
        $result=mysql_query("SELECT * FROM db_users WHERE db_users.id=$id");            
        while($ligne=  mysql_fetch_array($result))
        {
            echo '<p> Bonjour Mr : '.$ligne['nom'].'            '; 
        }
    }
    ?>
<input type="submit" name="Deconnexion" value="Deconnexion">
</p>
</form>
<br><br>
    <link href="style.css" rel="stylesheet" media="all" type="text/css"> 
   
    <center><ul id="menu">  
    <li><a href="index.php?uc=pageCreatePlate&action=CreerPlaque&type=plate">Plate</a>  
        <ul>  
            <li><a href="index.php?uc=pageCreatePlate&action=CreerTypePlaque&typePlate=mother">Create Mother Plate</a></li>
            <li><a href="index.php?uc=pageCreatePlate&action=CreerTypePlaque&typePlate=daughter">Create Daughter Plate</a></li>
            <!--<li><a href="index.php?uc=pageCreatePlate&action=CreerTypePlaque&typePlate=layout">Create Plate Layout</a></li>-->
            <li><a href="index.php?uc=pageCreatePlate&action=CreerTypePlaque&typePlate=quantity">Create Plate Layout quantity</a></li>
        </ul>  
    </li>
        <li><a href="index.php?uc=pageCreateProp&action=CreerProp&type=prop">Properties</a>
            <ul>
                <li><a href="index.php?uc=pageCreateProp&action=CreerTypeProp&typeProp=class">Create Class</a></li>
                <li><a href="index.php?uc=pageCreateProp&action=CreerTypeProp&typeProp=instance">Create Instance</a></li>
                <li><a href="index.php?uc=pageCreateProp&action=CreerTypeProp&typeProp=property">Create Property</a></li>
                <li><a href="index.php?uc=pageCreateProp&action=CreerTypeProp&typeProp=typeValues">Create Type Values</a></li>
            </ul>
        </li>
        <li><a href="index.php?uc=pageUsers&action=CreerUser&type=user">Users</a>
            <ul>
                <li><a href="index.php?uc=pageUsers&action=Users&type=creerUser">Create Users</a></li>
                <li><a href="index.php?uc=pageUsers&action=Users&type=modifierUser">Update Password</a></li>
            </ul>
        </li>
    </ul></center>
