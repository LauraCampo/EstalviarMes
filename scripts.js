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
//    $('table thead th').addClass('titulo');
//    $('table tbody tr:even').addClass('par');
//    $('table tbody tr:odd').addClass('impar');
var estilosfilas=function(tabla){
                    $('tbody tr:even',tabla).removeClass('impar').addClass('par');
                    $('tbody tr:odd',tabla).removeClass('par').addClass('impar');
                }
                $('table').each(function(){
                    var paginaActual=0;
                    var filasporPagina=5;
                    var tabla=$(this);
                    //Definimos función de repaginado
                    var repaginar = function(){
                        tabla.find('tbody tr').hide().slice(paginaActual*filasporPagina,
                            (paginaActual+1)*filasporPagina).show();
                    };
                    //Obtenemos total de filas y calculamos cuantas páginas habrán
                    var numeroFilas=tabla.find('tbody tr').length;
                    var numeroPaginas=Math.ceil(numeroFilas/filasporPagina);
                    //Preparamos los número de página para utilizar paginación
                    var capapagina=$('<div class="pagina"></div>');
                    for (var pagina=0;pagina<numeroPaginas;pagina++){
                        $('<span class="numero-pagina"></span>')
                            .text(pagina+1)
                            .on('click',{nuevaPagina:pagina},function(event){
                                paginaActual=event.data['nuevaPagina'];
                                repaginar();
                                $(this).addClass('verpagina').siblings().removeClass('verpagina');
                        }).appendTo(capapagina).addClass('clickable');
                    }

                    //Insertamos los números de páginas antes de la tabla
                    capapagina.insertBefore(tabla);
                    repaginar();

                    estilosfilas(tabla); //Aplicamos los estilos
                    $('thead td',tabla).each(function(columna){
                        //Buscamos en las celdas de cabecera el tipo de ordenación
			var cabecera=$(this);
			var encontrarclave; //Almecenará función de comparación
			if (cabecera.is('.texto')){
                            //Función comparación de texto
                            encontrarclave=function(celda){
                                return celda.text().toUpperCase();
                            };
			}else if (cabecera.is('.numero')){
                            //Función de comparación de texto
                            encontrarclave=function(celda){
                                var clave=parseInt(celda.text());
				return isNaN(clave) ? 0: clave;
                            };
			}//Fin de definición función encontrar clave
			//Si hay clave de ordenación
                        if(encontrarclave){
                            //Definimos estilos al pasar cursor
                            cabecera.addClass('clickable').hover(function(){
                                cabecera.addClass('hover');
                            },function(){
                                cabecera.removeClass('hover');
                            });
                            //Definimos evento click de celda de cabecera
                            cabecera.click(function(){
				var direccion=1;//Ordenación ascendente o descendente
				if(cabecera.is('.tituloasc')){
				   direccion=-1;
				}
				var filas=tabla.find('tbody > tr').get();
                                //En cada fila definimos clave de ordenación
                                $.each(filas,function(index,fila){
                                    var celda=$(fila).children('td').eq(columna);
                                    fila.key=encontrarclave(celda); //Clave de ordenación
				});

                                //Función de ordenación mediante las claves
				filas.sort(function(a,b){
                                    if (a.key<b.key) return -direccion;
                                    if (a.key>b.key) return direccion;
                                    return 0;
				});
				//Acrualizamos la tabla ordenada
                                $.each(filas,function(indice,fila){
                                    tabla.children('tbody').append(fila);
                                    fila.key=null; //Desactivar clave para elemento ordenado
				});

                                //Desactivar estilos de ordenación
				tabla.find('thead td').removeClass('titulodes').removeClass('tituloasc');
				//Aplicar estilo según dirección ordenación
				if (direccion==1)
                                    cabecera.addClass('tituloasc');
				else
                                    cabecera.addClass('titulodes');
                                //Quitamos y luego aplicamos estilo de ordenación a la columna ordenada
                                tabla.find('tbody td').removeClass('ordenar');
                                tabla.find('tbody td').filter(':nth-child('+(columna+1)+')').addClass('ordenar');
                                repaginar();
                                estilosfilas(tabla); //Aplicamos los estilos de las filas
                            });//Fin evento click
			}//Fin encontrarclave
                    });//Fin each control columnas cabecera
                });//Fin each tabla



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