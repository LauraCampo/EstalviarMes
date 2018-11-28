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