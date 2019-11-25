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
        <header> <!-- capcelera central superior: data actual + safata de notificacions -->
            <div>
                <a href="index.php">
                    <img id="logo_sup" src="images/porquet_logo.png" alt="logo">
                </a>
	    </div>
            <div id="notifications">
            <div id="current_date">
                <script>
                    var mesos = new Array ("de Gener","de Febrer","de Març","d'Abril","de Maig","de Juny","de Juliol","d'Agost","de Setembre","d'Octubre","de Novembre","de Desembre");
                    var f=new Date();
                    document.write(f.getDate() + " " + mesos[f.getMonth()] + " de " + f.getFullYear());
                </script>
                <a href="#">
                    <img id="config_icon" src="images/config_logo.png" alt="logo">
                </a>
                </div>
            <div id="notification_reminder">
<!--                <p>No tens missatges per avui</p>-->
                <?php
                $conexion= mysqli_connect("127.0.0.1","root","localtestdeveloper","EstalviarMes");
                $sel="SELECT SUM(Import)AS value_sum FROM Moviments";
                $exec= mysqli_query($conexion, $sel);
                $row = mysqli_fetch_assoc($exec); 
                $saldo = $row['value_sum'];
                ?>
                <p><?php echo($saldo) ?>€</p>
            </div>
        </div>
        </header>    
<!--        <div id="contingut1" class="contingut">
            <p>Per començar escull una opció del menú.</p>
        </div>-->
        <div id="contingut2" class="contingut">
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
        </div><!--moviment.php-->
        <input id="cercador" type="text" placeholder="Cercar..">
        <div id="moviment_list_final">
            <table id="taula_moviments">
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
            </table>
        </div>  
        </div>
    </body>
</html>
