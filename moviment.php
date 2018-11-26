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
          $sel="SELECT * FROM Moviments";
        $exec= mysqli_query($conexion, $sel);
//        if (!$check1_res) {
//            printf("Error: %s\n", mysqli_error($conexion));
//            exit();
//        }
//        ?>
        <h3>Llistat de moviments creats:</h3>
        <div id="moviment_list">
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
                        <td><!-- esborrar registre --> </td>
                    </tr>
                </tbody>
                </table>
<?php }     
    }
    else{ //(else -> en cas de què NO s'hagi enviat)
 ?>
                    <form action="moviment.php" method="post" >
                        <!-- apareix número automàtic -->
                            <input class="boton" type="text" size="2" name="Numero_moviment" readonly value="<?php echo($cont);?>">
                            Data:<input type="text" size="10" name="Data">
                            <!--#TODO:
                                - que aparegui la data d'avui per defecte
                                - que es pugui desplegar el calendari
                            -->
                            Import:<input type="text" size="10" name="import">
                            <!--#TODO:
                                - que aparegui el simbol d'euros
                                - que hi hagi una casella adjunta amb ingrés o
                                  despesa i que si es despesa que aparegui el
                                  simbol menys.
                            -->
                            Categoria:<input type="text" size="10" name="Categoria">
                            <!--#TODO:
                                - que es desplegui el tipus de despesa
                                    TAULA: Categories
                                - afegir icones al tipus de despesa
                            -->
                            Proveïdor:<input type="text" size="10" name="Proveidor">
                            <!--#TODO:
                                - que es desplegui la llista de proveïdors
                                    TAULA: Proveidors
                                - relacionar la llista de proveïdors amb el tipus de despesa
                            -->
                            Concepte:<input type="text" size="20" name="Concepte">
                            Mètode:<input type="text" size="10" name="Metode">
                        <!-- Esborrar formulari -->
                            <input type="reset" class="boto" value="Esborrar">
                        <!-- Acceptar nou mètode -->
                            <input type="submit" class="boto" value="Afegir" name="afegir">
                    </form>
<?php } ?>     
</div>
    </body>
</html>
