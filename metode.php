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
        <h3>Llistat de mètodes creats:</h3>   
<?php
    $conexion= mysqli_connect("127.0.0.1","root","localtestdeveloper","EstalviarMes");
    if(isset($_POST["Nom"])){ //en cas de què s'hagi enviat el formulari
          echo("enviat");
          //aquí afegir dades a la taula Mètode
                        $insert="INSERT INTO Metodes VALUES (";
            #TODO: the first field is not available to insert (autoincrement number)
            #      consult how to insert alternate values into table
                $insert.="'".$_POST["Nom"]."'".",";
                $insert.=")";        
                $exec= mysqli_query($conexion, $insert);
          goto a;
    }
    else{ //(else -> en cas de què NO s'hagi enviat)
        a:
        $sel="SELECT * FROM Metodes";
        $exec= mysqli_query($conexion, $sel);
        //if (!$check1_res) {
        //    printf("Error: %s\n", mysqli_error($conexion));
        //    exit();
        //}
?>
        <div id="metode_list">
            <form action="metode.php" method="post">
                <table>
                    <thead>
                    <tr>
                        <th>Posició</th>
                        <th>Nom</th>
                        <th>Esborrar</th>
                    </tr>
                </thead>
                <tbody>        
<?php
while($registre= mysqli_fetch_array($exec)){
?>
                    <tr>
                        <td><?php echo($registre[0]);?></td><!--Referencia-->
                        <td><?php echo($registre[1]);?></td><!--Nom-->
                        <td><!-- esborrar registre -->
                        
                        </td>
                    </tr>
<?php } ?>
                    <tr>
                        <td><!-- apareix número automàtic -->
                            <?php echo($registre[0]+1);?> 
                        </td>
                        <td><!-- s'introdueix nou mètode -->
                            Nom:<input type="text" size="20" name="Nom">
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



