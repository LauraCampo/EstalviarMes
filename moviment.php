<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Estalviar i Més</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
        <link rel="stylesheet" href="style.css" type="text/css">
        <!--<script   src="https://code.jquery.com/jquery-3.3.1.js"   integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="   crossorigin="anonymous"></script>-->
        <script src="jQuery_3.3.1.js"></script>
        <script type="text/javascript" src="scripts.js"></script>
    </head>
    <body>
        <h3>Llistat de moviments creats:</h3>   
<?php
    $conexion= mysqli_connect("127.0.0.1","root","localtestdeveloper","EstalviarMes");
    if(isset($_POST["Nom"])){ //en cas de què s'hagi enviat el formulari
          //aquí afegir dades a la taula Mètode
                $insert="INSERT INTO Moviments VALUES (";
                $insert.="'".$_POST["Numero_moviment"]."'".",";
                $insert.="'".$_POST["Data"]."'".",";
                $insert.="'".$_POST["Import"]."'".",";
                $insert.="'".$_POST["Categoria"]."'".",";
                $insert.="'".$_POST["Proveidor"]."'".",";
                $insert.="'".$_POST["Concepte"]."'".",";
                $insert.="'".$_POST["Mètode"]."'";
                $insert.=")";
                //echo $insert;
                $exec= mysqli_query($conexion, $insert);
//        if (!$check1_res) {
//            printf("Error: %s\n", mysqli_error($conexion));
//            exit();
//        }
          goto a;
    }
    else{ //(else -> en cas de què NO s'hagi enviat)
        a:
        $sel="SELECT * FROM Moviments";
        $exec= mysqli_query($conexion, $sel);
//        if (!$check1_res) {
//            printf("Error: %s\n", mysqli_error($conexion));
//            exit();
//        }
?>
        <div id="moviment_list">
            <form action="moviment.php" method="post" >
                <table>
                    <thead>
                    <tr>
                        <th>Posició</th>
                        <th>Data</th>
                        <th>Import</th>
                        <th>Categoria</th>
                        <th>Proveidor</th>
                        <th>Concepte</th>
                        <th>Mètode</th>
                        <th>Esborrar</th>
                    </tr>
                </thead>
                <tbody>        
<?php
while($registre= mysqli_fetch_array($exec)){
    $cont = $registre[0];
    $cont=$cont+1;
?>
                    <tr>
                        <td><?php echo($registre[0]);?></td><!--Referencia-->
                        <td><?php echo($registre[1]);?></td><!--Data-->
                        <td><?php echo($registre[2]);?></td><!--Import-->
                        <td><?php echo($registre[3]);?></td><!--Categoria-->
                        <td><?php echo($registre[4]);?></td><!--Proveidor-->
                        <td><?php echo($registre[5]);?></td><!--Concepte-->
                        <td><?php echo($registre[6]);?></td><!--Mètode-->
                        <td><!-- esborrar registre -->    
                        </td>
                    </tr>
<?php } ?>
                    <tr>
                        <td><!-- apareix número automàtic -->
                            <input class="boton" type="text" size="2" name="Numero_moviment" readonly value="<?php echo($cont);?>">
                        </td>
                        <td>
                            Data:<input type="text" size="10" name="Data">
                        </td>
                        <td>
                            Import:<input type="text" size="10" name="import">
                        </td>
                        <td>
                            Categoria:<input type="text" size="10" name="Categoria">
                        </td>
                        <td>
                            Proveïdor:<input type="text" size="10" name="Proveidor">
                        </td>
                        <td>
                            Concepte:<input type="text" size="20" name="Concepte">
                        </td>
                        <td>
                            Mètode:<input type="text" size="10" name="Metode">
                        </td>
                        <td><!-- Esborrar formulari -->
                            <input type="reset" class="boto" value="Esborrar">
                        </td>
                        <td><!-- Acceptar nou mètode -->
                            <input type="submit" class="boto" value="Afegir" name="afegir">
                        </td>
                    </tr>
            </tbody>
        </table>
    </form>
<?php } ?>     
</div>
    </body>
</html>
