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
    var estilosfilas=function(tabla){
                    $('tbody tr:even', tabla).removeClass('impar').addClass('par');
                    $('tbody tr:odd', tabla).removeClass('par').addClass('impar');
                }
               $('table thead th').addClass('titulo');
               // $('table tbody tr:even').addClass('par');
               // $('table tbody tr:odd').addClass('impar');
               //Lo aplicamos a cada tabla
               $('table').each(function(){
                  var tabla=$(this); //Contendrá toda la tabla
                  $('thead th',tabla).each(function(columna){ //sólo tratamos la cabecera
                      estilosfilas(tabla);
                      var cabecera=$(this);
                      if(cabecera.is('.titulo')){
                          //Función para cuando situamos el cursor sobre la cabecera
                          cabecera.addClass('clickable').hover(function(){
                             cabecera.addClass('hover'); 
                          },function(){
                             cabecera.removeClass('hover'); 
                          });
                          //Función para cuando se hace clic, aqui es donde se ordena
                          cabecera.click(function(){
                              //Obtenemos un array de todas las filas
                              var filas=tabla.find('tbody > tr').get();
                              //función de ordenación
                              filas.sort(function(a,b){
                                  var claveA=$(a).children('td').eq(columna).text().toUpperCase();
                                  var claveB=$(b).children('td').eq(columna).text().toUpperCase();
                                  if(claveA<claveB) return -1;
                                  if(claveA>claveB) return 1;
                                  return 0;
                              });
                              $.each(filas,function(index,fila){
                                 tabla.children('tbody').append(fila); 
                              }); //.each
                              tabla.find('td').removeClass('ordenar');
                              tabla.find('td').filter(':nth-child('+(columna+1)+')').addClass('ordenar');
                              estilosfilas(tabla);
                          }); //.click
                      } //if
                  }); //$(thead td,tabla)
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