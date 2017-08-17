jQuery(document).ready(function($){
    $.ajax({
            url:'https://www.cscpro.org/secura/battle/42651-1.json',
            type:'GET',
            dataType:'json',

        })
        .done(function(result){
            alert(result.defender.name);
            })
        })


