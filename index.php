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
                    var diesSetmana = new Array("Diumenge","Dilluns","Dimarts","Dimecres","Dijous","Divendres","Dissabte");
                    var f=new Date();
                    document.write(diesSetmana[f.getDay()] + ", " + f.getDate() + " " + mesos[f.getMonth()] + " de " + f.getFullYear());
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
                <p>Saldo total:<?php echo($saldo) ?>€</p>
            </div>
        </div>
        </header>
        <div class="caixa_formulari"> <!-- menú principal-->
            <!--
            #TODO:
                - eliminar l'aspecte d'enllaç ( violeta al marcar i subratllat)
                - l'enllaç a configuració que sigui només una icona (a un costat)
            -->
			<nav>
			    <ul id="lista_menu">
                                <li id="submenu1">
                                    <div id="moviment"><a href="#">Afegir moviment</a></div><!--moviment.html-->
                                </li>
			        <li id="submenu2">
                                    <div id="moviments_totals"><a href="#">Moviments totals</a></div><!--extracte.php-->
                                </li>
			    </ul>
			</nav>
        </div>
            <div id="contingut1" class="contingut">
                <p>Per començar escull una opció del menú.</p>
            </div>
    </body>
</html>
