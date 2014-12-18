<html>
<head>
</head>
<body>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript">
        function test (){
            document.location.href="index.php?uc=pageCreatePlate&action=CreerTypePlaque&typePlate=selectMap"; 
        }
        </script>
    <h4> Insertion de plaques mere</h4>
    <?php $result=mysql_query("SELECT * FROM db_instance where idClass=4");?>
    <form method="POST" name="Choix" action="index.php?uc=pageCreatePlate&action=CreerMotherPlate">
        Nb rows: <INPUT type="text" placeholder="rows" name="dimRow" size="5"><BR><br>
        Nb columns: <INPUT type="text" placeholder="columns" name="dimCol" size="5"><br><br>
        <!--Layout type:<SELECT name="typeLayout" size="1">
            <option>Mixture</option>
            <option>Quantity</option>
            <option>Sample</option>
            <option>Map</option>
        </select> -->
        Plate Type: <SELECT name="type" size="1">
        <?php
        while($ligne=mysql_fetch_array($result)){
          $type=$ligne['name'];
          echo'<OPTION>'.$type.'</option>';
        }
        ?>
        </SELECT>
        <br><br>
        Barcode: <INPUT type="text" placeholder="Saisir le barcode" name="barcode" size="30">
        <br><br>
        Plate Name: <INPUT type="text" placeholder="Saisir le nom de la plaque" name="name" size="30">
        <br><br>        
        <button  id="Send"  type="submit" name="Add" placeholder="Add"> Add </button>
    </form>
    <input onclick="test()" value="selectMap" TYPE="submit">

    <form method="POST" name="createMap" action="index.php?uc=pageCreatePlate&action=CreerTypePlaque&typePlate=layout">
        Cr&eacute;er nouvelle map : dim rows: <INPUT type="text" name="dimRow" size="5"> dim col: <INPUT type="text" name="dimCol" size="5"> 
        <button type="submit" name="OK" > Ok </button>
    </form>
    <form method="POST" action="index.php?uc=pageCreatePlate&action=retourDemandeForm">
        <button  id="Send"  type="submit" name="Valider" placeholder="Valider"> retour </button>
        <?php
        include ("Class/csv.php");
        $donnees=new csv();
        $fichier="UseCase1_1.csv";
        $donnees -> lire_csv($fichier);
        var_dump($donnees);
        ?>
    </form>
</body>
</html>
