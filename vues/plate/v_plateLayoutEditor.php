<html>
    <head>
        <script type="text/javascript" src="fonction.js/behaviour.js"></script>
        <script type="text/javascript" src="fonction.js/func_layout.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    </head>
    <body>
        <div>
            <input onclick="selectAll()" value="Select All" type="submit">
            <input onclick="unselectAll()" value="Unselect All" type="submit">
            <input onclick="selectAllUntaggedWells()" value="Select All Untagged Wells" type="submit">
            <input onclick="unselectAllUntaggedWells()" value="Unselect All Untagged Wells" type="submit">
            <input onclick="clearAllTags()" value="Clear All Tags" type="submit">
        </div>
        <div>
            <table id="plateLayoutTable" cols="24">
                <?php
                $row=$_POST['dimRow'];
                $column=$_POST['dimCol'];
                //tableau allant de A1 à P24 ---> 384 puits
                    $lettre='A';
                    $j=1;
                    while ($j<=$row){
                        echo'<tr>';
                        $i=1;
                        while($i<=$column){
                            echo "<td>$lettre$i</td>";
                            $i=$i+1;
                        }
                        echo'</tr>';
                        $lettre++;
                        $j=$j+1;
                    }
                ?>
            </table>
        </div>
            <div>
                <p>Tag:
                    <select id="wellTagName" size="1" name="WellTagName" onchange="matchColor()">
                        <option value="Pos_Ctrl" selected="selected" >Positive ctrl</option>
                        <option value="Neg_Ctrl">Negative ctrl</option>
                        <option value="Empty">Empty well</option>
                        <option value="Sample">Sample</option>
                    </select>
                Color:
                    <select id="wellTagColor" size="1" name="WellTagColor" disabled="true">
                        <option value="Aqua" selected="selected">Blue</option>
                        <option value="Lime">Green</option>
                        <option value="Teal">Teal</option>
                        <option value="Yellow">Yellow</option>
                    </select>
                </p>
                <p>
                    <input onclick="tagSelectedWells()" value="Tag" type="submit">
                    <input onclick="untagSelectedWells()" value="Untag" type="submit">
                </p>
                <p>
                    <b>Click</b> on wells to toggle selected/unselected.<br>
                    <b>Ctrl+click</b> to toggle the entire row.<br>
                    <b>Shift+click</b> to toggle the entire column.
                </p>
                
                <form method="post" action="index.php?uc=pageCreatePlate&action=CreerMapWells">
                    <input  type="hidden" name="rows" value="" size="200" id="RowParam"  ><br>
                    <input type="hidden" name="columns" value="" size="200" id="ColParam" ><br>
                    <input type="hidden" name="names" value="" size="200" id="NameParam" >
                    <button id="Send"  type="submit" name="Valider" placeholder="valider"> valider </button>
                </form>
                
            </div>
        </form>
        <form method="POST" action="index.php?uc=pageUsers&action=retourDemandeForm">
            <button  id="Send"  type="submit" name="retour" placeholder="retour"> retour </button>
        </form>   
    </body>
</html>


