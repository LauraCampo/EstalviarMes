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
});            