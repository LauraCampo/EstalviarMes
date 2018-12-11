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
$sel="SELECT * FROM Moviments ORDER BY Data DESC";
$exec= mysqli_query($conexion, $sel);
//if (!$check1_res) {
//    printf("Error: %s\n", mysqli_error($conexion));
//    exit();
//}
?>
        <input id="cercador" type="text" placeholder="Cercar..">
        <div id="moviment_list_final">
            <table id="taula_moviments">
                    <thead>
                    <tr>
                        <td class="fecha">Data</td>
                        <td class="texto">Categoria</td>
                        <td class="texto">Proveïdor</td>
                        <td class="texto">Concepte</td>
                        <td class="texto">Mètode</td>
                        <td class="numero">Import</td>
                    </tr>
                </thead>
                <tbody>  
<?php
while($registre= mysqli_fetch_array($exec)){
?>
                <tr>
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
    </body>
</html>



