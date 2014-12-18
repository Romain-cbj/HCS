<html>
    <head>
        <script type="text/javascript" src="fonction.js/behaviour.js"></script>
        <script type="text/javascript" src="fonction.js/func_selectMap.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    </head>
    <body>
        <div>
            <table id="plateLayoutTable" cols="24">
                <?php
                //tableau allant de A1 à P24 ---> 384 puits
                    $lettre='A';
                    while ($lettre!='Q'){
                        echo'<tr>';
                        $i=1;
                        while($i<=24){
                            echo "<td>$lettre$i</td>";
                            $i=$i+1;
                        }
                        echo'</tr>';
                        $lettre++;
                    }
                ?>
                

            </table>
        </div>
        <br>
        <form method="POST" action="index.php?uc=pageCreatePlate&action=CreerTypePlaque&typePlate=selectMap">
            <select name="nameMap" size="1">
                        
            </select>
            <button type="submit" name="btn_map">OK</button>
        </form>
        <form method="POST" action="index.php?uc=pageCreatePlate&action=retourDemandeMap">
    </body>
</html>


