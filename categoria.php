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
        <h3>Llistat de categories creades:</h3>   
<?php
$conexion= mysqli_connect("127.0.0.1","root","++++","EstalviarMes");
$sel="SELECT * FROM Categories";
$exec= mysqli_query($conexion, $sel);
//if (!$check1_res) {
//    printf("Error: %s\n", mysqli_error($conexion));
//    exit();
//}
?>
<div id="categoria_list">
        <table>
            <thead>
                <tr>
                    <th>Posició</th>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
<?php
while($registre= mysqli_fetch_array($exec)){
?>
                <tr>
                    <td><?php echo($registre[0]);?></td><!--Referencia-->
                    <td><?php echo($registre[1]);?></td><!--Nom-->
                    <td>
                </tr>
<?php } ?>
            </tbody>
        </table>
</div>
    </body>
</html>

