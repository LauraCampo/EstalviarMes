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
        var paginaActual=0;
        var fileresperPagina=5;
        var taula=$(this); //contindrà tota la taula
        //Definim la funció de repaginat
        var repaginar = function(){
            taula.find('tbody tr').hide().slice(paginaActual*fileresperPagina,
            (paginaActual+1)*fileresperPagina).show();
        }
        //Obtenim total de fileres i calculem quantes pàgines hauran
        var nombreFileres=taula.find('tbody tr').length;
                  var nombrePagines=Math.ceil(nombreFileres/fileresperPagina);
                  //Preparem els números de pàgina per utilitzar paginació
                  var capapagina=$('<div class="pagina"></div>');
                  for(var pagina=0;pagina<numeroPaginas;pagina++){
                      $('<span class="numero-pagina"></span>')
                              .text(pagina+1)
                              .bind('click',{novaPagina:pagina},function(event){
                                  paginaActual=event.data['novaPagina'];
                                  repaginar();
                                  $(this).addClass('veurepagina').siblings().removeClass('veurepagina');
                              }).appendTo(capapagina).addClass('clickable');
                  }
                  /*
                  for(var pagina=0;pagina<numeroPaginas;pagina++){
                    $('<span class="numero-pagina">'+(pagina+1)+'</span>').appendTo(capapagina).addClass('clikable');  
                  };
                  */
                  //Insertamos los números de página antes de la tabla
                  repaginar();
                  capapagina.insertBefore(taula);
                  //repaginar();
                  taula.find('tbody tr').hide().slice(paginaActual*fileresperPagina,
                  (paginaActual+1)*fileresperPagina).show();
        estilosfilas(tabla); //Aplicamos los estilos
        $('thead th',taula).each(function(columna){ //capçalera
//            estilsfileres(taula);
//Busquem a les cel.les de la capçalera el tipus d'ordenació
            var capçalera=$(this);
            var trobarclau; //Enmagatcemará funció de comparació
            if(capçalera.is('.texte')){
                      //Funció de comparació text
                      trobarclau=function(celda){
                          return cela.text().toUpperCase();
                      };
                  }else if(capçalera.is('.numero')){
                      //Función de comparació de text
                      trobarclau=function(cela){
                          var clau=parseInt(cela.text());
                          return isNaN(clau) ? 0: clau;
                      };
                  } //Fi de definició trobar clau
                  
            //si hi ha clau d'ordenació
             if(encontrarclave){
                      //Definimos estilos al pasar el cursor
                      cabecera.addClass('clickable').hover(function(){
                          cabecera.addClass('hover');
                      },function(){
                          cabecera.removeClass('hover');
                      });
                      //Definimos evento click de celda de cabecera
                      cabecera.click(function(){
                          var direccion=1; //Ordenación ascendente o descendente
                          if(cabecera.is('.tituloasc')){
                              direccion=-1;
                          }
                          var filas=tabla.find('tbody > tr').get();
                          //En cada fila definimos clave de ordenación
                          $.each(filas,function(index,fila){
                              var celda=$(fila).children('td').eq(columna);
                              fila.key=encontrarclave(celda); //clave de ordenación
                          }); //fin each filas
                          
                          //función de ordenación mediante las claves
                          filas.sort(function(a,b){
                              if(a.key<b.key) return -direccion;
                              if(a.key>b.key) return direccion;
                              return 0;
                          });
                          //Actualizamos la tabla ordenada
                          $.each(filas, function(indice,fila){
                              tabla.children('tbody').append(fila);
                              fila.key=null; //Desactivar clave para elemento ordenado
                          });
                          
                          //Desactivar estilos ordenación
                          tabla.find('thead td').removeClass('titulodes').removeClass('tituloasc');
                          //Aplicar estilo según estilo de ordenación
                          if(direccion==1)
                              cabecera.addClass('tituloasc');
                          else
                              cabecera.addClass('titulodes');
                          //Quitamos y luego aplicamos el estilo de ordenación a la columna ordenada
                          tabla.find('tbody td').removeClass('ordenar');
                          tabla.find('tbody td').filter('nth-child('+(columna+1)+')').addClass('ordenar');
                          estilosfilas(tabla); //Aplicamos los estilos de las filas
                      }); //Fin evento click
                  } //Fin encontrarclave
            
            
            
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
                    taula.find('td').removeClass('endressar');
                    taula.find('td').filter(':nth-child('+(columna+1)+')').addClass('endressar');
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