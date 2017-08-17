jQuery(document).ready(function($){
    $.ajax({
        url:'http://mysafeinfo.com/api/data?list=dinosaurs&format=xml',
        type:'GET',
        dataType:'xml',

    })
        .done(function(result){
        allData = $(result).find('d');

            allData.each(function(index,el){
                $('#wrap').append('<p>'+$(this).attr('nm')+'</p>')
            })
    })
        .fail(function(){
          console.log("error");
        })

});
