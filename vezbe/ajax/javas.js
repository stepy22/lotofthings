function posaljiZahtev(){
    var auto = $('#auto').val();

    $.ajax({
        type :'GET',
        url:'auto.php',
        data:{auto:auto},
       statusCode:{
           404:function(status,odgovorS){
               $('#odgovorS').html(status+':'+odgovorS)
           },
            200:function(status,odgovorS){
               $('#odgovorS').html(odgovorS)
           },
       }
})
}
       
        
    $('#auto').keyup(function(){
        posaljiZahtev();
    })
