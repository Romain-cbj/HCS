
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <title>Plate Quantity Editor</title>
        <script type="text/javascript" src="fonction.js/behaviour.js"></script>
        <script type="text/javascript" src="fonction.js/func_layout_qty.js"></script>
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
                    //tableau allant de A1 à P24 ---> 384 puits
                        $lettre='A';
                        while ($lettre!='Q'){
                            echo'<tr>';
                            $i=1;
                            while($i<=24){
                                echo "<td>0</td>";
                                $i=$i+1;
                            }
                            echo'</tr>';
                            $lettre++;
                        }
                    ?>
                </table>
        </div>
        <div>
                <p>Controls to define Dilution Series. Select wells in the table, specify the dilution parameters (Starting Values, Dilution Factor, Number of Replicates, Dilution Method and Operation) and click on 'Add Concentrations' to calculate the concentration values and add them to the selected wells.</p>
                <p>Starting Value:
                        <input id="ConcValueBox" value="20" type="text">
                        <select id="ConcUnitBox" size="1"> <!-- A generer en php, à partir de la table de vocabulaire "units" -->
                                <option value="M">M</option>
                                <option value="mM">mM</option>
                                <option value="µM" selected="selected">µM</option>
                                <option value="nM">nM</option>
                                <option value="pM">pM</option>
                                <option value="g/L">g/L</option>
                                <option value="g/mL">g/mL</option>
                                <option value="mg/mL">mg/mL</option>
                                <option value="µg/mL">µg/mL</option>
                                <option value="pg/mL">pg/mL</option>
                                <option value="%">%</option>
                                <option value="u/mL">u/mL</option>
                        </select>
                <br>Dilution Factor:
                        <input id="FactorValueBox" value="2" type="text">
                <br>Dilution Operator:
                        <select id="OperatorBox" size="1">
                                <option value="*"> * </option>
                                <option value="/" selected="selected"> / </option>
                                <option value="*10^x"> * 10^x</option>
                                <option value="*10^-x"> * 10^-x</option>
                                <option value="Copy">Copy</option>
                        </select>		
                <br>Number of Replicates:
                        <input id="NumRepBox" value="10" type="text">
                <br>Dilution Method:
                        <select id="MethodBox" size="1">
                                <option value="Across" selected="selected">Across Rows</option>
                                <option value="Down">Down Columns</option>
                        </select>
                </p>

                <p>
                        <input onclick="tagSelectedWells();" value="Add Concentrations" type="submit">
                        <input onclick="untagSelectedWells();" value="Remove Concentrations" type="submit">
                </p>
                
                <form method="post" action="index.php?uc=pageCreatePlate&action=CreerMapQuantity">
                        <input type="hidden" name="rows" value="" id="RowParam" ><br> <!-- remplacer "disabled" par "hidden" -->
                        <input type="hidden" name="columns" value="" id="ColParam" ><br>
                        <input type="hidden" name="values" value="" id="ConcValueParam" ><br>
                        <input type="hidden" name="units" value="" id="ConcUnitParam">
                        <button id="Send"  type="submit" name="Valider" placeholder="valider"> valider </button>
                </form>
                
        </div>
        <form method="POST" action="index.php?uc=pageCreateProp&action=retourDemandeForm">
        <button  id="Send"  type="submit" name="Retour" placeholder="Retour"> retour </button>
        </form>    
    </body>
</html>
