$(document).ready(function(){    
//********MENÚ PRINCIPAL********
//CLICAR A ICONA CONFIGURACIÓ
    $('#config_icon').click(function(){
        $("#contingut1").load('configuracio.php');
    });
//******** INGRES ***********
//REALITZAR L'APUNT D'UNA DESPESA:               
    $('#moviment').click(function(){
        $("#contingut1").load('moviment.html');
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
});            