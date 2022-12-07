$(function(){

    $(document).on('click','#appliquer', function(event){
        event.preventDefault();

        var direction= $("#direction").val();
        var role= $("#role").val();
        var _token = $('input[type="hidden"]').attr('value');

        $.ajax({

            url:"/store",
            data : {
                direction,
                role,
                _token
            },
            dataType : "json",
            method : "POST",
            success : function(data){
                alert("Inséré avec succes");
            }
        });
    });

});