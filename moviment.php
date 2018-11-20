<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Estalviar i Més</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="jquery-3.3.1.js"></script>
        <script type="text/javascript" src="scripts.js"></script>
    </head>
    <body><div id="form_moviment">
                <form action="moviment2.php" method="post">
                    Data:<input type="text" size="8" name="Data"><br>
                    <!--TODO:
                            - que aparegui la data d'avui per defecte
                            - que es pugui desplegar el calendari
                    -->
                    Import:<input type="text" size="30" name="Import">€<br>
                    <!--TODO:
                            - que aparegui el simbol d'euros
                            - que hi hagi una casella adjunta amb ingrés o
                              despesa i que si es despesa que aparegui el
                              simbol menys.
                    -->
                    Categoria:<input type="text" size="40" name="Tipus"><br>
                    <!--TODO:
                            - que es desplegui el tipus de despesa
                                TAULA: Categories
                            - afegir icones al tipus de despesa
                    -->
                    Proveïdor:<input type="text" size="20" name="Proveidor"><br>
                    <!--TODO:
                            - que es desplegui la llista de proveïdors
                                TAULA: Proveidors
                            - relacionar la llista de proveïdors amb el tipus de despesa
                    -->
                    Concepte:<input type="text" size="20" name="Concepte"><br>
                    Mètode:<input type="text" size="20" name="Metode"><br>
                    <input type="reset" class="boton" value="Esborrar dades">
                    <input type="submit" class="boton" value="Realitzar moviment" name="alta">
                </form>
            </div>
    </body>
</html>


