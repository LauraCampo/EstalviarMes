<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Estalviar i Més</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="jQuery_3.3.1.js"></script>
        <script type="text/javascript" src="scripts.js"></script>
    </head>
    <body>
        <header> <!-- capcelera central superior: data actual + safata de notificacions -->
            <div id="notifications">
            <div id="current_date">
                <script>
                    var mesos = new Array (" de Gener","de Febrer","de Març","d'Abril","de Maig","de Juny","de Juliol","d'Agost","de Setembre","d'Octubre","de Novembre","de Desembre");
                    var diesSetmana = new Array("Diumenge","Dilluns","Dimarts","Dimecres","Dijous","Divendres","Dissabte");
                    var f=new Date();
                    document.write(diesSetmana[f.getDay()] + ", " + f.getDate() + " " + mesos[f.getMonth()] + " de " + f.getFullYear());
                </script>
                </div>
            <div id="notification_reminder">
                <p>No té missatges per avui</p>
            </div>
        </div>
        </header>
        <aside> <!-- menú principal, a capa lateral -->
		<div>
                    <a href="index.php">
                        <img id="logo_sup" src="imagenes/taxilogo.png" alt="logo taxi">
                    </a>
		</div> 
			<nav>
			<!-- menú lateral (principal) -->
			    <ul id="lista_menu">
                                <li id="submenu1">Afegir moviments
                                    <div id="despesa"><a href="#">Despesa</a></div><!--.php-->
                                    <div id="ingres"><a href="#">Ingrés</a></div><!--.php--> 
                                </li>
			        <li id="submenu2">Consulta
                                    <div id="ultimsmoviments"><a href="#">Moviments últims 15 dies</a></div><!--.php-->
                                    <div id="moviments"><a href="#">Moviments</a></div><!--.php-->
                                </li>
                                <li id="submenu3">
                                    <a href="#">Gestión Caja</a>
                                </li> 
			    </ul>
			</nav>
        </aside>
            
            <div class="contenido">
                <p>Per començar escull una opció del menú lateral.</p>
            </div>
    </body>
</html>
