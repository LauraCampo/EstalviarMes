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
        //echo ("ENVIAT!!!!!");
    $conexion= mysqli_connect("127.0.0.1","root","localtestdeveloper","EstalviarMes");
    $Data=$_POST["Any"].$_POST["Mes"].$_POST["Dia"];
          //aquí afegir dades a la taula Moviments
                $insert="INSERT INTO Moviments VALUES (";
                $insert.="'".$_POST["Numero_moviment"]."'".",";
                $insert.="'".$Data."'".",";
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
        $sel="SELECT * FROM Moviments ORDER BY Data DESC";//LIMIT 25
        //$sel="SELECT * FROM Moviments";
        $exec= mysqli_query($conexion, $sel);
//        if (!$check1_res) {
//            printf("Error: %s\n", mysqli_error($conexion));
//            exit();
//        }
        ?>
        <input id="cercador" type="text" placeholder="Cercar..">
        <div id="moviment_list_final">
                <table>
                    <thead>
                    <tr>  
                        <th class="fecha">Data</th>
                        <th class="texto">Categoria</th>
                        <th class="texto">Proveïdor</th>
                        <th class="texto">Concepte</th>
                        <th class="texto">Mètode</th>
                        <th class="numero">Import</th>
                    </tr>
                </thead>
                <tbody>        
<?php
while($registre= mysqli_fetch_array($exec)){
?>
                    <tr class="fileres">
                        <td><?php echo(date("d-m-Y", strtotime($registre[1])));?></td><!--Data-->
                        <td><?php echo($registre[3]);?></td><!--Categoria-->
                        <td><?php echo($registre[4]);?></td><!--Proveidor-->
                        <td><?php echo($registre[5]);?></td><!--Concepte-->
                        <td><?php echo($registre[6]);?></td><!--Mètode-->
                        <td class="columna_import"><?php echo($registre[2]);?>€</td><!--Import-->
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
?>
<?php
        $sel="SELECT MAX(Referencia) AS Referencia FROM Moviments";
                            $exec0= mysqli_query($conexion, $sel);
                            while($registro= mysqli_fetch_array($exec0)){
                                $cont = $registro[0];
                                $cont=$cont+1;
                            }
 ?>
            
<!-- aqui afegir la taula -->
<!--<div id="contingut2" class="contingut">-->
<?php
$conexion= mysqli_connect("127.0.0.1","root","localtestdeveloper","EstalviarMes");
$sel="SELECT * FROM Moviments ORDER BY Data DESC";
$exec= mysqli_query($conexion, $sel);
//if (!$check1_res) {
//    printf("Error: %s\n", mysqli_error($conexion));
//    exit();
//}
?>      
        <div id="moviment">
            <a href="#">Afegir nou moviment</a>
        </div><!--moviment.html-->
        <input id="cercador" type="text" placeholder="Cercar..">
        <div id="moviment_list_final">
            <table id="taula_moviments">
                    <thead>
                    <tr>
                        <th class="numero">Contador</th>
                        <th class="fecha">Data</th>
                        <th class="texto">Categoria</th>
                        <th class="texto">Proveïdor</th>
                        <th class="texto">Concepte</th>
                        <th class="texto">Mètode</th>
                        <th class="numero">Import</th>
                    </tr>
                </thead>
                <tbody>
<!-- aqui afegir el formulari -->
<div id="moviment_list">
                    <form action="moviment.php" method="post" >
                        <tr>
                            <td>
                                <!-- apareix número automàtic -->
                                <input type="text" size="10" name="Numero_moviment" readonly value="<?php echo($cont);?>"><br>      
                                    <?php
                                     $today = getdate();
                                     //var_dump($today);
                                     //#TODO:que es pugui desplegar el calendari
                                     if($today[mday]<10){
                                         $dia="0".$today[mday];
                                     }else{
                                        $dia=$today[mday];
                                     }
                                     if($today[mon]<10){
                                         $mes="0".$today[mon];
                                     }else{
                                        $mes=$today[mon];
                                     }
                                    ?>
                            </td>                   
                            <td>
                               <input type="text" size="2" name="Dia" value="<?php echo $dia ?>">
                               <input type="text" size="2" name="Mes" value="<?php echo $mes ?>">
                               <input type="text" size="4" name="Any" value="<?php echo $today[year] ?>">
                            </td>
                            <td>
                                <label for="Categoria"></label>
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
                                    //#TODO: afegir icones al tipus de despesa
                                    ?>        
                                </select>
                            </td>
                            <td>
                                <label for="Proveidor"></label>
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
                                    //#TODO: relacionar la llista de proveïdors amb el tipus de despesa
                                    ?>        
                                </select>
                            </td>
                            <td>
                               <input type="text" size="30" name="Concepte"> 
                            </td>nume
                            <td>
                                <input id="import" type="number" step="0.01" size="6" name="Import" value="0">€
                                <input  id="ingres" type="radio" name="ing_des" value="0.01" checked>Ingrès
                                <input id="despesa" type="radio" name="ing_des" value="-0.01">Despesa
                            </td>
                            
                            
                            
                            <td>
                                <label for="Metode">Escollir mètode:</label>
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
                                </select>
                            </td>
                            <td>
                                <input type="reset" class="boto" value="Esborrar">
                            </td>
                            <td>
                                <input type="submit" class="boto" value="Afegir" name="afegir">
                            </td>
                        </tr>
                    </form>
</div>
<?php
$conexion= mysqli_connect("127.0.0.1","root","localtestdeveloper","EstalviarMes");
$sel="SELECT * FROM Moviments ORDER BY Data DESC";
$exec= mysqli_query($conexion, $sel);
//if (!$check1_res) {
//    printf("Error: %s\n", mysqli_error($conexion));
//    exit();
//}   
while($registre= mysqli_fetch_array($exec)){
?>
                <tr class="fileres">
                        <td><?php echo($registre[0]);?></td><!--Referencia-->
                        <td><?php echo(date("d-m-Y", strtotime($registre[1])));?></td><!--Data-->
                        <td><?php echo($registre[3]);?></td><!--Categoria-->
                        <td><?php echo($registre[4]);?></td><!--Proveidor-->
                        <td><?php echo($registre[5]);?></td><!--Concepte-->
                        <td><?php echo($registre[6]);?></td><!--Mètode-->
                        <td class="columna_import"><?php echo($registre[2]);?>€</td><!--Import-->
                    </tr>        
<?php } ?>
            </table>
        </div>  
<?php } ?>
                
    <!--</div>-->
    </body>
</html>
