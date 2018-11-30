$(document).ready(function(){    
//********MENÚ PRINCIPAL********
//CLICAR A ICONA CONFIGURACIÓ
    $('#config_icon').click(function(){
        $("#contingut1").load('configuracio.php');
    });
//******** AFEGIR MOVIMENT ***********
//AFEGIR MOVIMENT:             
    $('#moviment').click(function(){
        $("#contingut1").load('moviment.php');
    });
    //escollir si es despesa o ingrès
    //si es despesa afegir "-" +  color vermell
    $('#despesa').click(function(){
        $("#import").addClass("numeros_vermells");
        $("#import").attr('value','-0.01');//que es posi aquest valor si cliques a despesa
        $("#import").attr('max','-0.01');//el màxim valor possible si es negatiu
        $("#import").removeAttr('min');//sense mínim possible
    });
    //si es ingrès color negre
    $('#ingres').click(function(){
        $("#import").removeClass("numeros_vermells");
        $("#import").attr('min','0.01'); //el minim valor possible si es positiu
        $("#import").removeAttr('max');//sense màxim possible
    });
    //CLICK ON form's submit:
    //SHOW .php in .content:
    $('#moviment_list form').submit(function(event) { 
      console.log('Afegir moviment');
      event.preventDefault();
      var formValues = $(this).serialize();
      $.post('moviment.php', formValues ,function(data){
          $('#contingut1').html(data);
      });     
    });
//CLICAR A MOVIMENTS TOTALS:
    $('#moviments_totals').click(function(){
        $("#contingut1").load('extracte.php');
    });
//******** VISTES DE LA TAULA DE MOVIMENTS ***********
    var estilsfileres=function(taula){
        $('tbody tr:even',taula).removeClass('imparell').addClass('parell');
        $('tbody tr:odd',taula).removeClass('parell').addClass('imparell');
    };
    $('table thead th').addClass('capçalera');
    $('table tbody tr:even').addClass('parell');
    $('table tbody tr:odd').addClass('imparell');
    
    $('table').each(function(){
        var taula=$(this); //contindrà tota la taula
        $('thead th',taula).each(function(columna){ //capçalera
            estilsfileres(taula);
            var capçalera=$(this);
            if(capçalera.is('.capçalera')){ //retorna TRUE si la variable capçalera és de la classe .capçalera
                //función para cuando situamos el cursor sobre la cabecera
                capçalera.addClass('clickable').hover(function(){
                   capçalera.addClass('hover'); 
                },function(){
                    capçalera.removeClass('hover');
                });
                //función para cuando se hace clic, aqui es donde se ordena
                capçalera.click(function(){ //cuando hacemos click en la cabecera
                    //obtenemos un array con todas las filas
                    var files=taula.find('tbody > tr').get();
                    //Función de ordenación
                    files.sort(function(a,b){
                        var clauA=$(a).children('td').eq(columna).text().toUpperCase();
                        var clauB=$(b).children('td').eq(columna).text().toUpperCase();
                        if(clauA < clauB) return -1;
                        if(clauB > clauA) return 1;
                        return 0;
                    });
                    $.each(files,function(index,fila){
                        taula.children('tbody').append(fila);
                    });//each
                    estilsfileres(taula);
                });//click
            }//if
        });//$(thead th,tabla)
    }); //table
//******** MENÚ CONFIGURACIÓ ***********
//CATEGORIA
    $('#categoria').click(function(){
        $("#contingut2").load('categoria.php');
    });
//MÈTODE
    $('#metode').click(function(){
        $("#contingut2").load('metode.php');
    });
    //CLICK ON form's submit:
    //SHOW .php in .content:
    $('#metode_list form').submit(function(event) {
      console.log('Afegir metode');
      event.preventDefault();
      var formValues = $(this).serialize();
      $.post('metode.php', formValues ,function(data){
          $('#contingut2').html(data);
      });     
    });
//PROVEIDOR
    $('#proveidor').click(function(){
        $("#contingut2").load('proveidor.php'); 
    });
    //CLICK ON form's submit:
    //SHOW .php in .content:
    $('#proveidor_list form').submit(function(event) {
      console.log('Afegir proveïdor');
      event.preventDefault();
      var formValues = $(this).serialize();
      $.post('proveidor.php', formValues ,function(data){
          $('#contingut2').html(data);
      });     
    });
});            