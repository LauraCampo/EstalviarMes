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
                $insert="INSERT INTO Metodes VALUES (";
                $insert.="'".$_POST["Numero_metode"]."'".",";
                $insert.="'".$_POST["Nom"]."'";
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
        $sel="SELECT * FROM Metodes ORDER BY Referencia DESC";
        $exec= mysqli_query($conexion, $sel);
//        if (!$check1_res) {
//            printf("Error: %s\n", mysqli_error($conexion));
//            exit();
//        }
?>
        <div id="metode_list">
            <form action="metode.php" method="post" >
                <table>
                    <thead>
                    <tr>
                        <th>Posició</th>
                        <th>Nom</th>               
                        <th>Afegir</th>
                    </tr>
                </thead>
                <tbody>        
<?php
$conexion= mysqli_connect("127.0.0.1","root","localtestdeveloper","EstalviarMes");
$sel="SELECT MAX(Referencia) AS Referencia FROM Metodes";
                            $exec0= mysqli_query($conexion, $sel);
                            while($registro= mysqli_fetch_array($exec0)){
                                $cont = $registro[0];
                                $cont=$cont+1;
                            }
?>
                    <tr>
                        <td><!-- apareix número automàtic -->
                            <input class="boton" type="text" size="2" name="Numero_metode" readonly value="<?php echo($cont);?>">
                        </td>
                        <td><!-- s'introdueix nou mètode -->
                            Nom:<input type="text" size="20" name="Nom">
                        </td>
                        <td><!-- Acceptar nou mètode -->
                            <input type="submit" class="boto" value="Afegir" name="afegir">
                        </td>
                    </tr>                
<?php
while($registre= mysqli_fetch_array($exec)){
//   $cont = $registre[0];
//   $cont=$cont+1;
?>
                    <tr>
                        <td><?php echo($registre[0]);?></td><!--Referencia-->
                        <td><?php echo($registre[1]);?></td><!--Nom-->
                        <td><!-- esborrar registre -->    
                        </td>
                    </tr>
<?php } ?>               
            </tbody>
        </table>
    </form>
<?php } ?>     
</div>
    </body>
</html>
