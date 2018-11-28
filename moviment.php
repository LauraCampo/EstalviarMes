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
    if(isset($_POST["Import"])){ //en cas de què s'hagi enviat el formulari
    $conexion= mysqli_connect("127.0.0.1","root","localtestdeveloper","EstalviarMes");
          //aquí afegir dades a la taula Moviments
                $insert="INSERT INTO Moviments VALUES (";
                $insert.="'".$_POST["Numero_moviment"]."'".",";
                $insert.="'".$_POST["Data"]."'".",";
                $insert.="'".$_POST["Import"]."'".",";
                $insert.="'".$_POST["Categoria"]."'".",";
                $insert.="'".$_POST["Proveidor"]."'".",";
                $insert.="'".$_POST["Concepte"]."'".",";
                $insert.="'".$_POST["Metode"]."'";
                $insert.=")";
                //echo $insert;
                $exec= mysqli_query($conexion, $insert);
//        if (!$check1_res) {
//            printf("Error: %s\n", mysqli_error($conexion));
//            exit();
//        }
        $sel="SELECT * FROM Moviments ORDER BY Data DESC LIMIT 10";
        //$sel="SELECT * FROM Moviments";
        $exec= mysqli_query($conexion, $sel);
//        if (!$check1_res) {
//            printf("Error: %s\n", mysqli_error($conexion));
//            exit();
//        }
        ?>
        <h3>Llistat de moviments creats:</h3>
        <div id="moviment_list_final">
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
                
        
<?php } ?>
                </tbody>
                </table>
        </div>
<?php   }
    else{ //(else -> en cas de què NO s'hagi enviat)
        $conexion= mysqli_connect("127.0.0.1","root","localtestdeveloper","EstalviarMes");
        //$sel="SELECT * FROM Moviments";
        //$exec= mysqli_query($conexion, $sel);
//        if (!$check1_res) {
//            printf("Error: %s\n", mysqli_error($conexion));
//            exit();
//        }
        $sel="SELECT MAX(Referencia) AS Referencia FROM Moviments";
                            $exec0= mysqli_query($conexion, $sel);
                            while($registro= mysqli_fetch_array($exec0)){
                                $cont = $registro[0];
                                $cont=$cont+1;
                            }
 ?>
            <h3>Afegeix un nou moviment:</h3>
            <div id="moviment_list">
                    <form action="moviment.php" method="post" >
                        <!-- apareix número automàtic -->
                        <input type="text" size="10" name="Numero_moviment" readonly value="<?php echo($cont);?>"><br>
                        Data(AAAA-MM-DD):<input type="text" size="10" name="Data"><br>
                            <!--#TODO:
                                - que aparegui la data d'avui per defecte
                                - que es pugui desplegar el calendari
                            -->
                            Import:<input type="text" size="10" name="Import">€
                            <input type="radio" name="ing_des" value="????" checked>Ingrès
                            <input type="radio" name="ing_des" value="????">Despesa
                            <br>
                            <!-- #TODO: si es despesa que aparegui el simbol menys al davant -->
                                <label for="Categoria">Escollir categoria:</label> <br/>
                                <select id="Categoria" name="Categoria">
                                    <option value="" selected="selected">- selecciona -</option>
                                    <!-- aqui ha de fer un recorregut x la taula: -->
                                    <?php 
                                    $conexion= mysqli_connect("127.0.0.1","root","localtestdeveloper","EstalviarMes");
                                    $sel="SELECT Nom FROM Categories";      
                                    $exec= mysqli_query($conexion, $sel);
                                    while($registre= mysqli_fetch_array($exec)){
                                    echo("<option value='".$registre[0]."'>".$registre[0]."</option>");
                                    };
                                    ?>        
                                </select><br>
                            <!-- #TODO: afegir icones al tipus de despesa -->
                            <label for="Proveidor">Escollir proveïdor:</label> <br/>
                                <select id="Proveidor" name="Proveidor">
                                    <option value="" selected="selected">- selecciona -</option>
                                    <!-- aqui ha de fer un recorregut  x la taula: -->
                                    <?php 
                                    $conexion= mysqli_connect("127.0.0.1","root","localtestdeveloper","EstalviarMes");
                                    $sel="SELECT Nom FROM Proveidors";      
                                    $exec= mysqli_query($conexion, $sel);
                                    while($registre= mysqli_fetch_array($exec)){
                                    echo("<option value='".$registre[0]."'>".$registre[0]."</option>");
                                    };
                                    ?>        
                                </select><br>
                            <!-- #TODO: relacionar la llista de proveïdors amb el tipus de despesa -->
                            Concepte:<input type="text" size="30" name="Concepte"><br>
                            <label for="Metode">Escollir mètode:</label> <br/>
                                <select id="Metode" name="Metode">
                                    <option value="" selected="selected">- selecciona -</option>
                                    <!-- aqui ha de fer un recorregut  x la taula: -->
                                    <?php 
                                    $conexion= mysqli_connect("127.0.0.1","root","localtestdeveloper","EstalviarMes");
                                    $sel="SELECT Nom FROM Metodes";      
                                    $exec= mysqli_query($conexion, $sel);
                                    while($registre= mysqli_fetch_array($exec)){
                                    echo("<option value='".$registre[0]."'>".$registre[0]."</option>");
                                    };
                                    ?>        
                                </select><br>
                            <input type="reset" class="boto" value="Esborrar">
                            <input type="submit" class="boto" value="Afegir" name="afegir">
                    </form>
<?php } ?>
                </div>
    </body>
</html>
