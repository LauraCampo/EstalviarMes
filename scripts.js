$(document).ready(function(){    
//******** INGRES ***********
//REALITZAR L'APUNT D'UNA DESPESA:               
    $('#moviment').click(function(){
        $(".contingut").load('moviment.html');
    });
//******** MENÚ CONFIGURACIÓ ***********
//CATEGORIA
    $('#categoria').click(function(){
        $(".contingut").load('categoria.php');
        
    });
//MÈTODE
    $('#metode').click(function(){
        $(".contingut").load('metode.php');
        
    });
    //CLICK ON form's submit:
    //SHOW .php in .content:
    $('#form_altas_inq form').submit(function(event) {
      console.log('Alta inquilinos');
      event.preventDefault();
      var formValues = $(this).serialize();
      $.post('metode.php', formValues ,function(data){
          $('.contingut').html(data);
      });     
    });
});            