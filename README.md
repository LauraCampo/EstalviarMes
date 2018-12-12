# Estalviar Més #

Aplicatiu per controlar les finances personals.

Amb aquest aplicatiu es poden controlar les despeses i els ingressos del nostre dia a dia.
Les dades es guarden en una Base de Dades MySQL.<br>
L'interface és totalment gràfica en un entorn web.

 1.- Disseny de la base de dades:

 ![Screenshot](images/BD.png)<br>
    Taules relacionades:<br>
        - Moviments -> taula principal<br>
        - Categories -> tipus de despesa/ingrés<br>
        - Mètodes de Pagament -> tipus de via de pagament (editable)<br>
        - Proveïdors -> taula editable

 2.- Captura de la pàgina principal:
 
![Screenshot](images/screenshot_1.png)

## Funcions ##

Hi ha dues funcions principals:<br>
    - Introduir un apunt<br>
        Es pot introduir tant una despesa com un ingrès, i després es mostren tots el moviments efectuats.<br>
        Es mostren tots el moviments efectuats, endressats amb el més nou a dalt per defecte.<br>
        Es pot fer una cerca i filtrar desde la casella de cerca<br>
        Es poden endressar els resultats clicant a la capçalera de qualsevol columna<br>
    - Veure tots el moviments efectuats<br>
        Es mostren tots el moviments efectuats, endressats amb el més nou a dalt per defecte.<br>
        Es pot fer una cerca i filtrar desde la casella de cerca<br>
        Es poden endressar els resultats clicant a la capçalera de qualsevol columna<br>

També s'incorpora un apartat per la configuració:<br>
    - Mètodes de pagament<br>
        Aqui s'hi poden consultar/introduïr els mètodes de pagament i cobrament<br>
    - Categories<br>
        Aqui s'hi poden consultar les categories habilitades<br>
    - Proveïdors<br>
        Aqui s'hi poden consultar/introduïr els mètodes de pagament i cobrament<br>

