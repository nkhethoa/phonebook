$(document).ready(function(){
    
    $(document).on('keyup','#search',function(e){
        e.preventDefault(); 
        $.ajax({
            method: "POST",
            url: "/search",
            data: {"_token": $('meta[name="csrf-token"]').attr('content'),
                    'value': $('#search').val()
                    },
            dataType: 'json',
            success: function(data){
                $('.searchHTML').html(data.html);
            }
        });
    });
    
});