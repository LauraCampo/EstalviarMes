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
        <div class="caixa_formulari"> <!-- menú configuració, a capa lateral -->
            <!--
           TODO:
                - eliminar l'aspecte d'enllaç ( violeta al marcar i subratllat)
            -->
			<nav>
			<!-- menú lateral (principal) -->
			    <ul id="lista_menu">
			        <li id="submenu1">
                                    <div id="metode"><a href="#">Mètodes de pagament</a></div><!--metode.php-->
                                </li>
                                <li id="submenu2">
                                    <div id="categoria"><a href="#">Categories</a></div><!--categoria.php-->
                                </li>
                                <li id="submenu3">
                                    <div id="proveidor"><a href="#">Proveïdors</a></div><!--proveidor.php-->
                                </li>
			    </ul>
			</nav>
        </div>
            <div id="contingut2" class="contingut">
                <p>Per començar escull una opció del menú.</p>
            </div>
    </body>
</html>
